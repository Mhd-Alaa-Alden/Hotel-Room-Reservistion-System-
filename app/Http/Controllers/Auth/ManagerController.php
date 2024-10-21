<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManagerController extends Controller
{


    public function addAdmin(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users,email', // Ensure unique email address
            // Add any other validation rules as needed
        ]);
    
        // Create a new user record with the 'admin' role
        User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'usertype' => 'admin', // Assign the 'admin' role
            // Add any other necessary fields
        ]);
    
        // Redirect back with success message
        return back()->with('success', 'Admin added successfully');
    }
    
    public function removeAdmin(User $admin)
    {
        // Ensure that the authenticated admin has the necessary permission to remove admins
        if (auth()->user()->usertype !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
    
        // Delete the admin record
        $admin->delete();
    
        // Redirect back with success message
        return back()->with('success', 'Admin removed successfully');
    }
}
