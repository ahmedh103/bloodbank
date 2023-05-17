<?php

namespace App\Http\Requests\NotificationSettings;

use App\Http\Traits\JsonValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class saveNotificationSetting extends FormRequest
{
    use JsonValidationTrait;
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
            'blood_type_id'=>'required',
            'governorate_id'=>'required'
        ];
    }
}
