<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateStoryRequest extends FormRequest
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
          'title-story' => 'required|string',
          'description' => 'required|string',
          'lessons[]' => 'required|array',
          'background' => 'required|array',
          'character' => 'required|array',
          'background-2' => 'nullable|string|min:10|max:255',
          'character-2' => 'nullable|string|min:3|max:255',
        ];
    }

    public function messages(){
      return [
        'title-story.required' => 'Please enter title story.',
        'description.required' => 'Please enter description.',
        'background-2.min' => 'background must be at least 10 characters.',
        'background-2.max' => 'background must be less than 255 characters.',
        'character-2.min' => 'character must be at least 3 characters.',
        'character-2.max' => 'character must be less than 255 characters.',
      ];
    }
}
