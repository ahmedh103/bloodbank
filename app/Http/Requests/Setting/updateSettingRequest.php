<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class updateSettingRequest extends FormRequest
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
            'about_app'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'fb_link'=>'required',
            'tw_link'=>'required',
            'tw_link'=>'required',
           
        ];
    }
}
