<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {
    //

    public function showLoginForm() {
        return view( 'backend.login' );
    }

    public function doLogin( Request $request ) {

        $request->validate( [
            'email' => 'required',
            'password' => 'required',
        ] );
        $user = User::where( 'email', '=', $request->email )
        ->first();
        if ( $user && $user->role_id != 1 ) {

            $notification = array(
                'message' => 'invalid Credentials!',
                'alert-type' => 'danger'
            );

            return redirect()->back()->with( $notification );

        }
        $credentials = $request->only( 'email', 'password' );
        if ( Auth::attempt( $credentials ) ) {
            $notification = array(
                'message' => 'you are Logged in successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route( 'home' )->with( $notification );
        }

        return redirect( '/admin' )->with( 'failed', 'Login Details are not Valid' );
    }

    public function logout() {
        Session::flush();
        auth()->logout();
        return redirect()->route( 'admin.showlogin' );
    }
}
