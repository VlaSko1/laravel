<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AggregatorAdminProfileRequest extends FormRequest
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
                'min:2',
                'max:120'
            ],
            'email' => [
                'required'
            ],
            'is_admin' => [
                'required',
                'integer',
                'min:0',
                'max:1'
            ]
        ];
    }
}
