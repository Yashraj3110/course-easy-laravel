<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Validate everything
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string',
            'gender' => 'nullable|string',
            'dob' => 'nullable|date',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|confirmed|min:6'
        ]);

        // Update fields
        $user->fill([
            'name'   => $request->name,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'bio'    => $request->bio,
            'gender' => $request->gender,
            'dob'    => $request->dob,
        ]);

        // Update password only if given
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/profile'), $fileName);

            $user->photo = 'uploads/profile/' . $fileName;
        }

        $user->save(); // SAVE EVERYTHING

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
