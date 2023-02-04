<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }

  public function rules()
  {
    return [
      'first_name' => 'required|max:25',
      'last_name' => 'required|max:25',
      'email' => 'required|email',
      'role' => 'required|exists:role,role_id',
      'gender' => 'required|exists:gender,gender_id',
      'display_picture' => 'required|image',
      'password' => 'required|min:8|regex:(?=[a-zA-Z]*[0-9])',
      'confirm_password' => 'same:pasword|min:8|regex:(?=[a-zA-Z]*[0-9])',
    ];
  }
}
