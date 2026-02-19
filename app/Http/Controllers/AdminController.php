<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all(); // or paginate()
        return view('Dashboards.admin.users', compact('users'));
    }

    public function content()
    {
        $contents = Course::all(); // or filter if needed
        return view('Dashboards.admin.content', compact('contents'));
    }
}
