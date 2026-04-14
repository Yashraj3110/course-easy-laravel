<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /* ─── Dashboard ─────────────────────────────────────────────── */

    public function home()
    {
        $stats = [
            'total_students'      => User::where('role', 'student')->count(),
            'total_instructors'   => User::where('role', 'instructor')->count(),
            'pending_instructors' => User::where('role', 'instructor')->where('is_approved', false)->count(),
            'total_courses'       => Course::count(),
            'pending_approvals'   => Course::where('approval', 'pending')->count(),
            'total_enrollments'   => Enrollment::count(),
            'total_revenue'       => Enrollment::sum('amount_paid'),
        ];

        $recent_courses = Course::with('tutor')->latest()->take(5)->get();
        $recent_users   = User::latest()->take(5)->get();

        return view('Dashboards.admin.home', compact('stats', 'recent_courses', 'recent_users'));
    }

    /* ─── Users ─────────────────────────────────────────────────── */

    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('Dashboards.admin.users', compact('users'));
    }

    public function userToggleRole(User $user)
    {
        $newRole = $user->role === 'instructor' ? 'student' : 'instructor';
        $user->update([
            'role' => $newRole,
            'is_approved' => ($newRole === 'student') ? true : $user->is_approved
        ]);
        return back()->with('success', "User role changed to {$newRole}.");
    }

    public function userApprove(User $user)
    {
        $user->update(['is_approved' => true]);
        return back()->with('success', "User \"{$user->name}\" approved.");
    }

    public function userDestroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted.');
    }

    /* ─── Course Approvals ──────────────────────────────────────── */

    public function content()
    {
        $pending  = Course::with('tutor')->where('approval', 'pending')->latest()->get();
        $approved = Course::with('tutor')->where('approval', 'approved')->latest()->get();
        $rejected = Course::with('tutor')->where('approval', 'rejected')->latest()->get();

        return view('Dashboards.admin.content', compact('pending', 'approved', 'rejected'));
    }

    public function approveCourse(Course $course)
    {
        $course->update(['approval' => 'approved', 'status' => 'published']);
        return back()->with('success', "Course \"{$course->title}\" approved and published.");
    }

    public function rejectCourse(Request $request, Course $course)
    {
        $course->update(['approval' => 'rejected', 'status' => 'draft']);
        return back()->with('error', "Course \"{$course->title}\" rejected.");
    }

    /* ─── Finance ───────────────────────────────────────────────── */

    public function finance()
    {
        $enrollments = Enrollment::with(['user', 'course'])->latest()->paginate(20);
        $total_rev   = Enrollment::sum('amount_paid');
        return view('Dashboards.admin.finance', compact('enrollments', 'total_rev'));
    }

    /* ─── Logs ──────────────────────────────────────────────────── */

    public function logs()
    {
        return view('Dashboards.admin.logs');
    }
}
