<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        
        // Stats for current instructor
        $myCourseIds = Course::where('tutor_id', $user->id)->pluck('id');
        
        $stats = [
            'total_courses'    => $myCourseIds->count(),
            'total_students'   => Enrollment::whereIn('course_id', $myCourseIds)->distinct('user_id')->count(),
            'total_earnings'   => Enrollment::whereIn('course_id', $myCourseIds)->sum('amount_paid'),
            'pending_review'   => Course::where('tutor_id', $user->id)->where('approval', 'pending')->count(),
        ];

        $recent_enrollments = Enrollment::with(['user', 'course'])
            ->whereIn('course_id', $myCourseIds)
            ->latest()
            ->take(5)
            ->get();

        $my_courses = Course::where('tutor_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        return view('Dashboards.instructor.home', compact('stats', 'recent_enrollments', 'my_courses'));
    }

    public function enrollments()
    {
        $user = Auth::user();
        $myCourseIds = Course::where('tutor_id', $user->id)->pluck('id');
        
        $enrollments = Enrollment::with(['user', 'course'])
            ->whereIn('course_id', $myCourseIds)
            ->latest()
            ->paginate(15);
            
        return view('Dashboards.instructor.enrollments', compact('enrollments'));
    }

    public function analytics()
    {
        $user = Auth::user();
        $myCourseIds = Course::where('tutor_id', $user->id)->pluck('id');
        
        $stats = [
            'total_students' => Enrollment::whereIn('course_id', $myCourseIds)->distinct('user_id')->count(),
            'total_revenue'  => Enrollment::whereIn('course_id', $myCourseIds)->sum('amount_paid'),
            'avg_rating'     => Course::where('tutor_id', $user->id)->avg('rating') ?: 0,
            'completion_rate' => 0, // Placeholder for now
        ];
        
        return view('Dashboards.instructor.analytics', compact('stats'));
    }

    public function reviews()
    {
        // For now placeholder, but could load from a reviews table if it exists
        return view('Dashboards.instructor.reviews');
    }
}
