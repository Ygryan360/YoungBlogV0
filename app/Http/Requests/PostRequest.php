<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => ['required', 'min:8', 'max:255'],
            'content' => ['required', 'min:120'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['exists:tags,id', 'array', 'required'],
            'cover' => ['url:http,https', 'nullable'],
        ];
    }
}
