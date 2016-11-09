<?php

namespace Ourgarage\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Notifications;

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
        if(is_null($this->route('id'))){
            $rules = [
                'title' => 'required|unique:posts',
                'slug' => 'required|unique:posts',
                'category' => 'required',
                'content' => 'required|unique:posts',
                'meta_keywords' => 'required',
                'meta_description' => 'required',
                'meta_title' => 'required',
            ];
        } else {
            $rules = [
                'title' => 'required|unique:posts,title,'.$this->route('id'),
                'slug' => 'required|unique:posts,slug,'.$this->route('id'),
                'category' => 'required',
                'content' => 'required|unique:posts,content,'.$this->route('id'),
                'meta_keywords' => 'required',
                'meta_description' => 'required',
                'meta_title' => 'required',
            ];
        }

        return $rules;
    }

    public function response(Array $errors)
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
