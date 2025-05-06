<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        User::create($input);

        return redirect()
            ->route('users.index')
            ->with('status', 'User created successfully');
    }

    public function edit(User $user)
    {
        $user->load(['profile', 'interests']);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(User $user, Request $request)
    {
        $input = $request->validate([
            'name'=> 'required',
            'email' => 'required|email',
            'password' => 'exclude_if:password,null|min:6'
        ]);

        $user->fill($input);
        $user->save();

        return redirect()
            ->route('users.index')
            ->with('status', 'User updated sucessfully');
    }

    public function updateProfile(User $user, Request $request)
    {
        $input = $request->validate([
            'type' => 'required',
            'address' => 'nullable'
        ]);

        UserProfile::updateOrCreate([
            'user_id' => $user->id,], $input
        );

        return back()
            ->with('status', 'User profile updated successfully');
    }

    public function updateInterests(User $user, Request $request)
    {
        $input = $request->validate([
            'interests' => 'nullable|array'
        ]);

        $user->interests()->delete();

        if(!empty($input['interests'])) {
            $user->interests()->createMany($input['interests']);
        }
        
        return back()
            ->with('status', 'User interests updated sucessfully');
    }

    public function updateRoles(User $user, Request $request)
    {
        $input = $request->validate([
            'roles' => 'nullable|Array'
        ]);

        $user->roles()->sync($input['roles']);

        return back()
            ->with('status', 'User roles updated successfully');
    }

    public function populateRoles()
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Editor']
        ];

        Role::insert($roles);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('status', 'User deleted sucessfuly!');
    }
}
