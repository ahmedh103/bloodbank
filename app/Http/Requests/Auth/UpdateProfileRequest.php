<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'city_id'=>'required',
            'blood_type_id'=>'required',
            'd_o_b'=>'required|date',
            'last_donation_date'=>'required|date'


        ];
    }
}
