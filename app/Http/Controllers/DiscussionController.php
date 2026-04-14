<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    /**
     * Show all discussions for a particular course.
     */
    public function show(Course $course)
    {
        $discussions = CourseComment::where('course_id', $course->id)
            ->whereNull('parent_id')
            ->with(['user', 'replies.user'])
            ->latest()
            ->get();
            
        return view('student.discussions', compact('course', 'discussions'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:course_comments,id',
        ]);

        if (!$course->isEnrolledBy(Auth::id())) {
            return back()->with('error', 'You must be enrolled to participate in discussions.');
        }

        CourseComment::create([
            'course_id' => $course->id,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'parent_id' => $request->parent_id,
        ]);

        return back()->with('success', 'Posted successfully!');
    }

    public function upvote(CourseComment $comment)
    {
        $comment->increment('upvotes');
        return back();
    }

    /**
     * Global discussions view (Dashboard).
     */
    public function index()
    {
        $user = Auth::user();
        $enrolledCourseIds = $user->enrollments()->pluck('course_id');
        
        $discussions = CourseComment::with(['course', 'user'])
            ->whereIn('course_id', $enrolledCourseIds)
            ->latest()
            ->paginate(15);

        return view('Dashboards.student.discussions', compact('discussions'));
    }
}
