<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AggregatorNewsRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'min:5',
                'max:255'
            ],
            'briefly' => [
                'required',
                'min:20',
                'max:500'
            ],
            'detail' => [
                'required',
                'min:100'
            ],
            'published' => [
                'required',
                'min:0',
                'max:1',
                'integer'
            ],
            'category_id' => [
                'required',
                'integer',
                'min:0'
            ]
        ];
    }
    public function attributes()
    {
        return [
            'name' => '"Название новости"',
            'briefly' => '"Краткое описание"',
            'detail' => '"Полный текст новости"'
            ];
    }
}
