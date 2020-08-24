<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceRequest extends FormRequest
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
            'link' => [
                'required',
                'min:30',
                'max:255'
            ],
            'slug' => [
                'required',
                'min:20',
                'max:255'
            ],
            'category_parsing' => [
                'required',
                'min:4',
                'max:130'
            ],
            'source' => [
                'required',
                'min:3',
                'max:255'
            ]
        ];
    }
    public function attributes()
    {
        return [
            'link' => '"Ссылка на источник rss"',
            'slug' => '"Описание источника rss"',
            'category_parsing' => '"Категория новостей парсинга"',
            'source' => '"Название ресурса"'
            ];
    }
}
