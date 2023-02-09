<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountController extends Controller
{
   public function register()
   {
      $genders = Gender::all();
      $roles = Role::all();
      return view('register', compact('genders', 'roles'));
   }

   public function createAccount(RegisterRequest $request)
   {
      DB::beginTransaction();
      try {
         $folder = '/storage/user/';
         $fileName = $request->display_picture->getClientOriginalName();
         $ext = $request->display_picture->getClientOriginalExtension();
         $fileFullName = $fileName . "_" . Str::random(10) . "_" . time() . $ext;
         $request->display_picture->move(public_path($folder), $fileFullName);

         Account::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender_id' => $request->gender,
            'role_id' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'display_picture' => $folder . $fileFullName
         ]);
      } catch (\Exception $e) {
         dd($e->getMessage());
         DB::rollBack();
         abort(500);
      }

      DB::commit();

      $request->flash('success', 'Registration successfull! Please login!');
      return to_route('login');
   }

   public function login()
   {
      return view('login');
   }

   public function authenticate(LoginRequest $request)
   {
      $account = Account::where('email', $request->email)->first();

      if (@$account && Hash::check($request->password, $account->password)) {
         $request->session()->regenerate();

         $request->session()->put('auth', Crypt::encrypt($account));

         $request->flash('success', 'Login successfull!');
         return redirect()->intended(route('item.index'));
      }


      return back()->with('loginError', 'Login Failed');
   }


   public function logout(Request $request)
   {
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      $request->session()->flush();

      return redirect()->route('login');
   }
}
