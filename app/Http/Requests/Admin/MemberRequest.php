<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
           'name'=>['required','string','max:255'],
           'position'=>['required','string','max:255'],
           'facebook'=>['nullable','string','url'],
           'twitter'=>['nullable','string','url'],
           'linkedin'=>['nullable','string','url'],
        ];
    }
    public function messages(): array{
        return [
            'name' => __("keywords.name"),
            'position' => __("keywords.position"),
            'image' => __("keywords.image"),
            'facebook' => __("keywords.facebook"),
            'twitter' => __("keywords.twitter"),
            'linkedin' => __("keywords.linkedin"),
        ];
    }
}
