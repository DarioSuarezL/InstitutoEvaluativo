<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $users = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => Carbon::parse($user->created_at)->format('Y-m-d H:i:s'),
                'created_formated' => Carbon::parse($user->created_at)->diffForHumans(),
            ];
        });
        return inertia('Users/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return inertia('Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return inertia('Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::find($id);

        if ($request->password != null) {
            $request->validate([
                'password' => 'required|string',
                'password_confirmation' => 'required|same:password',
            ]);
            $password = bcrypt($request->password);
        } else {
            $password = $user->password;
        }


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
        ]);
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }

}
