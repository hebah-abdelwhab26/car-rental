<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', [
            'user' => $user
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('users.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'role' => ['required'],
            'status' => ['required'],
            'phone' => ['nullable'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $imageName = null;

        if ($request->hasFile('profile_image')) {

            $image = $request->file('profile_image');

            $imageName = rand(1, 10000) . '_' . time() . '.' . $image->extension();

            $image->move(public_path('img/users'), $imageName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
            'phone' => $request->phone,
            'profile_image' => $imageName,
        ]);

        return redirect()
            ->route('users.index')
            ->with('message', 'User Created Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', [
            'user' => $user
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['nullable'],
            'role' => ['required'],
            'status' => ['required'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('users.index')
            ->with('message', 'User Updated Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $imagePath = public_path('img/users/' . $user->profile_image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $user->delete();

        return redirect()
            ->back()
            ->with('message', 'User Deleted Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | MAKE ADMIN
    |--------------------------------------------------------------------------
    */
    public function makeAdmin($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'role' => 'admin'
        ]);

        return redirect()
            ->back()
            ->with('message', 'User promoted to Admin');
    }

    /*
    |--------------------------------------------------------------------------
    | DISABLE USER
    |--------------------------------------------------------------------------
    */
    public function disable($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status' => '0'
        ]);

        return redirect()
            ->back()
            ->with('message', 'User Disabled');
    }

    /*
    |--------------------------------------------------------------------------
    | ACTIVATE USER
    |--------------------------------------------------------------------------
    */
    public function activate($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'status' => '1'
        ]);

        return redirect()
            ->back()
            ->with('message', 'User Activated');
    }
}
