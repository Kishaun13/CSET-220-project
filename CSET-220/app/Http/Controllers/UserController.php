<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Approve the specified user.
     */
    public function approve(User $user)
    {
        $user->approved = true;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User approved successfully.');
    }
}