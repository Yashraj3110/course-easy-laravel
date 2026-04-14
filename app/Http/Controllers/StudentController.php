<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\LectureProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /* ── Dashboard ─────────────────────────────────────────────── */
    public function home()
    {
        $user = Auth::user();
        
        // Active enrollments with progress
        $enrollments = Enrollment::with('course.tutor')
            ->where('user_id', $user->id)
            ->latest()
            ->take(6)
            ->get();

        // Enrolled course IDs to exclude from recommendations
        $enrolledIds = $enrollments->pluck('course_id')->toArray();

        // Recommended (approved but not enrolled)
        $recommended = Course::where('approval', 'approved')
            ->whereNotIn('id', $enrolledIds)
            ->latest()
            ->take(4)
            ->get();

        $stats = [
            'enrolled'   => Enrollment::where('user_id', $user->id)->count(),
            'completed'  => Enrollment::where('user_id', $user->id)->where('status', 'completed')->count(),
            'certs'      => Certificate::where('user_id', $user->id)->count(),
            'avg_progress' => Enrollment::where('user_id', $user->id)->avg('progress_percent') ?? 0,
        ];

        return view('Dashboards.student.home', compact('enrollments', 'recommended', 'stats'));
    }

    /* ── My Courses ────────────────────────────────────────────── */
    public function myCourses()
    {
        $user = Auth::user();
        $enrollments = Enrollment::with('course.tutor')
            ->where('user_id', $user->id)->latest()->paginate(12);
        return view('Dashboards.student.my-courses', compact('enrollments'));
    }

    /* ── Certificates ──────────────────────────────────────────── */
    public function certificates()
    {
        $certs = Certificate::with('course.tutor')
            ->where('user_id', Auth::id())->latest()->get();
        return view('Dashboards.student.certificates', compact('certs'));
    }

    /* ── Profile ───────────────────────────────────────────────── */
    public function profile()
    {
        $user = Auth::user();
        return view('Dashboards.student.profile', compact('user'));
    }

    /* ── Update Profile ────────────────────────────────────────── */
    public function update(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'phone'  => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'dob'    => 'nullable|date',
            'bio'    => 'nullable|string',
            'photo'  => 'nullable|image|max:2048',
        ]);

        $user = Auth::user();
        $user->name   = $request->name;
        $user->phone  = $request->phone;
        $user->gender = $request->gender;
        $user->dob    = $request->dob;
        $user->bio    = $request->bio;

        if ($request->hasFile('photo')) {
            $file     = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/users/'), $filename);
            $user->photo = 'uploads/users/' . $filename;
        }

        $user->save();
        return back()->with('success', 'Profile updated!');
    }

    /* ── Settings ──────────────────────────────────────────────── */
    public function settings()
    {
        $user = Auth::user();
        return view('Dashboards.student.settings', compact('user'));
    }

    public function downloadCertificate(Certificate $certificate)
    {
        if ($certificate->user_id !== Auth::id()) {
            abort(403);
        }

        $certificate->load(['user', 'course.tutor']);
        return view('student.certificate-template', compact('certificate'));
    }
}
