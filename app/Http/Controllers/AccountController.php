<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Account;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
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

      return back()->with('loginError', 'Wrong Email/Password. Please Check Again');
   }

   public function logout(Request $request)
   {
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      $request->session()->flush();

      return redirect()->route('login');
   }

   public function edit()
   {
      $account = $this->account;
      $genders = Gender::all();

      $account->load('role');

      return view('profile.update', compact('account', 'genders'));
   }

   public function update(UpdateProfileRequest $request)
   {
      $account = $this->account;

      if(@$request->display_picture)
      {
         $folder = '/storage/user/';
         $fileName = $request->display_picture->getClientOriginalName();
         $ext = $request->display_picture->getClientOriginalExtension();
         $fileFullName = $fileName . "_" . Str::random(10) . "_" . time() . $ext;
         $request->display_picture->move(public_path($folder), $fileFullName);
         $file = $folder . $fileFullName;
      }

      $display_picture = @$file ?? $account->display_picture;

      DB::beginTransaction();
      try{
         $account->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender_id' => $request->gender,
            'role_id' => $account->role_id,
            'email' => $request->email,
            'password' => @$request->password ? Hash::make($request->password) : $account->password,
            'display_picture' => $display_picture
         ]);
      } catch(\Exception $e) {
         DB::rollBack();
         abort(500);
      }

      DB::commit();
      session()->put('auth', Crypt::encrypt($account));

      return back()->with('success-swal', 'Profile Saved!');
   }

   public function index()
   {
      $accounts = Account::with('role')->paginate(10);

      return view('account-maintenance.index', compact('accounts'));
   }

   public function editRole(Account $account)
   {
      $user = $account;
      $roles = Role::all();

      return view('account-maintenance.update-role', compact('user', 'roles'));
   }

   public function updateRole(UpdateRoleRequest $request, Account $account)
   {
      $account->update([
         'role_id' => $request->role
      ]);

      return to_route('account.index')->with('success-swal', "Successfully Update Account Role");
   }

   public function destroy(Request $request)
   {
      $account = Account::find($request->account_id);

      $account->delete();
      return to_route('account.index')->with('success-swal', 'Successfully Delete Account');
   }
}
