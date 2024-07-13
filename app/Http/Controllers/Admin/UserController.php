<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_approved', false)->get();
        return view('admin.users.index', compact('users'));
    }

    public function approve(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin1,admin2,admin3,admin4,admin5,user1,user2,user3'
        ]);

        $user->is_approved = true;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User approved successfully.');
    }
}
