<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => "required|string",   
            'introduction' => ' required|string',
            'body' => 'required|string',
            "conclusion" => 'required|string',
            "category_id" => "required|array|min:1",
            'categories.*' => 'integer|exists:categories,id',
            'tag_id' =>"required",
            'tag.*' => 'integer|exits:tags,id',
            "link" => 'required',
            'image' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            "title.required" => 'it must to enter title for you Article',
            "title.string" => "The Title is must to be string",

            "introduction.required" => 'it must to add some intrudction to your ideas in Article',
            "introduction.string" => "The Introduction is must to be string",

            "body.required" => 'it must to add some Body to your ideas in Article',
            "body.string" => 'it must to add some body to your ideas in Article',

            "conclusion.required" => 'it must to add some conclusion to your ideas in Article',
            "conclusion.string" => 'it must to add some conclusion to your ideas in Article',

            'categories.required' => 'Please select at least one category.',
            'categories.min' => 'You must select at least one category.',
        ];
    }
}
