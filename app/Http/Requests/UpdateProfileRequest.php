<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;

class UpdateProfileRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
   try{
      $accountId = Crypt::decrypt(session()->get('auth'))->account_id;
   } catch (\Exception $e) {
      session()->flush();
      return to_route('login')->with('error-swal', 'Something gone wrong, please re-authenticated!');
   }

   return [
      'first_name' => 'required|max:25',
      'last_name' => 'required|max:25',
      'email' => 'required|email|unique:account,email,' . $accountId . ',account_id',
      'gender' => 'required|exists:gender,gender_id',
      'display_picture' => 'nullable|image',
      'password' => 'nullable|min:8|regex:/(?=[a-zA-Z]*[0-9])/',
      'password_confirmation' => 'required_with:password|same:password',
   ];
  }
}