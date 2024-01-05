<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Session;

class LoginController extends Controller
{
   public function login()
   {
      return view('auth.login');
   }
   public function postLogin(Request $request)
   {
      $request->validate([
         'email'    => 'required',
         'password' => 'required',
      ]);
      $user = User::where('email', $request->email)->first();

      if (!$user) {
         return back()->with('message', 'User not found');
      }

      if (!\Hash::check($request->password, $user->password)) {
         return back()->with('message', 'Invalid Username\Password');
      }

      if (Auth::guard('super-admin')->attempt(['email' => $request['email'], 'password' => $request['password']])) {
         return redirect()->route('dashboard');
      } else {
          \Session::flash('email', 'something is wrong!');
          return back();
      }
   }
   public function admin__logout()
   {
      Auth::logout();
      Session::flush();
      return redirect()->route('admin.login');
   }
}
