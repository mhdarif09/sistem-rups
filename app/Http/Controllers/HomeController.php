<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user(); // Get the authenticated user

        // Initialize $divisions as an empty collection
        $divisions = collect();

        if ($user->role === 'super_admin' || Str::startsWith($user->role, 'admin')) {
            // If user is super_admin or admin1-5, show all unique divisions
            $divisions = User::distinct()
                             ->pluck('divisi')
                             ->filter();
        } else {
            // If user is a regular user, show divisions they selected during registration and are approved
            $divisions = User::where('id', $user->id)
                             ->where('is_approved', true)
                             ->pluck('divisi');
        }

        // Ensure $divisions is passed to the view, even if it's empty
        return view('home', ['divisions' => $divisions]);
    }
}
