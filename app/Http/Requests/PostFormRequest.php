<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        $rules = [
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
            'min_to_read' => 'min:0|max:60',
            'tags' => 'required'
        ];

        if(in_array($this->method(), ['POST'])) {
            $rules['image'] = 'required|mimes:jpg,png,jpeg';
            $rules['title'] = 'required|max:255|unique:posts,title,' . $this->id;
        }
        else {
            $rules['title'] = 'required|max:255';
        }

        return $rules;
    }
}
