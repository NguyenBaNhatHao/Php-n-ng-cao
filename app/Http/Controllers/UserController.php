<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->can('list-users')) {
            abort('403');
        }

        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::user()->can('create-users')) {
            abort('403');
        }

        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('create-users')) {
            abort('403');
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $role = $request->input('role');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');


        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        $user->syncRoles([$role]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::user()->can('show-users')) {
            abort('403');
        }

        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->can('edit-users')) {
            abort('403');
        }

        $user = User::find($id);
        $roles = Role::all();
        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('edit users')) {
            abort('403');
        }

        $name = $request->input('name');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        $user = User::find($id);

        if ($name) {
            $user->name = $name;
        }

        if ($password && ($password == $password_confirmation)) {
            $user->password = Hash::make($password);
        }

        if (Auth::user()->can('edit-user_role')) {
            $role = $request->input('role');
            $user->syncRoles([$role]);
        }

        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('delete-users')) {
            abort('403');
        }

        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
