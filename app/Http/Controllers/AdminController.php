<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.index');
    }
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => $request->input('is_admin'),  
        ]);
        return redirect()->route('users.index')->with('success', 'Používateľ bol úspešne vytvorený.');
    }

    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8',
    ]);
    if ($request->filled('password')) {
        $user->password = Hash::make($request->input('password'));
    }

    $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'is_admin' => $request->input('is_admin'),  
    ]);
    return redirect()->route('users.index')->with('success', 'Používateľ bol úspešne aktualizovaný.');
}


    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
