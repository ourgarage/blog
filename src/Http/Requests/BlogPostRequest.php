<?php

namespace Ourgarage\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Notifications;
use Illuminate\Validation\Rule;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        $rules = [
            'title' => [
                'required',
                Rule::unique('posts')->ignore($this->route('id')),
            ],
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($this->route('id')),
            ],
            'category' => 'required',
            'content' => [
                'required',
                Rule::unique('posts')->ignore($this->route('id')),
            ],
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
            'date_published' => 'required|date',
        ];

        return $rules;
    }

    public function response(array $errors)
    {
        return redirect()->back()->withInput();
    }


    public function formatErrors(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Notifications::danger($error, 'page');
        }

        return $validator->errors()->getMessages();
    }
}
