<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // ЭТО ВРЕМЕННО, пока не добавлена авторизация!!!
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        $rules = [
            'title' => 'required|string|unique:title',
            'description' => '',
            'article' => 'required|string',
            'isActive' => 'required|boolean'
        ];

        /**
         * Для минимизации кода, используется конструкцию switch для разных
         * http-глаголов, вместо того, чтобы создавать отдельные Requests
         */
        switch ($this->getMethod()) {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                            'blog_id' => 'required|integer|exists:articles,id',
                            'title' => [
                                'required',
                                Rule::unique('blogs')->ignore($this->title, 'title')
                            ]
                        ] + $rules; // + все остальные правила
            // case 'PATCH':
            case 'DELETE':
                return [
                    'blog_id' => 'required|integer|exists:articles,id'
                ];
        }
    }
}
