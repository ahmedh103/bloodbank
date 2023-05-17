<?php

namespace App\Http\Requests\Auth;

use App\Http\Traits\JsonValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class saveRegisterRequest extends FormRequest
{
  
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone'=>'required',
            'email'=>'required|email',
            'name'=>'required',
            'city_id'=>'required|exists:cities,id',
            'password'=>'required|confirmed|min:6',
            'blood_type_id'=>'required|exists:blood_types,id',
            'd_o_b'=>'required',
            'last_donation_date'=>'required'
        ];
    }
}
