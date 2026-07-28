<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'nullable|string|max:255',
            'address'=>'nullable|string|max:255',
            'phone'=>'nullable|string|max:255',
            'email'=>'nullable|string|max:255',
            'fb_link'=>'nullable|string|max:255',
            'insta_link'=>'nullable|string|max:255',
            'twitter_link'=>'nullable|string|max:255',
            'favicon'=>'nullable|mimes:ico',
            'logo'=>'nullable|mimes:png,jpg,ico',
        ];
    }
}
