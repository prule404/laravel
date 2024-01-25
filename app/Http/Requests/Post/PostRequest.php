<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required' , 'min:3'],
            'description' => ['required' , 'min:5'],
            'post_creator' => ['required' , 'exists:users,id'],
        ];
    }
}
