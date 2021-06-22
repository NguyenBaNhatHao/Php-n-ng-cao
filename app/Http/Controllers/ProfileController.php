<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show_profile() {

        /*
         * check Auth:user() <- logged in user
         * có quyền hiển thị thông tin này không?
         *
         *
         * Logged in user có thuộc về role "Administrator" hay không
         * */

        $current_user = User::find(Auth::user()->id);

        return view('profile.index', compact('current_user'));
    }

    public function update_profile(Request $request) {
        $name = $request->input('name');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        $current_user = User::find(Auth::user()->id);

        if ($name) {
            $current_user->name = $name;
        }

        if ($password && ($password == $password_confirmation)) {
            $current_user->password = Hash::make($password);
        }

        $current_user->save();
        return redirect()->route('show-profile');
    }
}
