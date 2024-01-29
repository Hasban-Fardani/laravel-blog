<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePostRequest extends FormRequest
{
    /**
     * stop on first failure
     * 
     * @var bool
     * */
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->authorize('create-post');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' => 'required|string',
            'slug' => 'required|string',
            'body' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required',
            'user_id' => 'required',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,pending,published',
            'tags' => 'nullable|string',
        ];
    }
}
