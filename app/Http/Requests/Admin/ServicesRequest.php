<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ServicesRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                Rule::unique('services', 'title')->ignore($this->route('service')),

            ],
            'icon' => 'required|string',
            'description' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __("keywords.title"),
            'icon' => __("keywords.icon"),
            'description' => __("keywords.description"),
        ];
    }
}
