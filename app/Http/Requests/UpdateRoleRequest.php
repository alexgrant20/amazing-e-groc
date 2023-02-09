<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'role' => 'required|exists:role,role_id',
      ];
   }
}
