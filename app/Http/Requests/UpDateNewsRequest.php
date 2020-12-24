<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpDateNewsRequest extends FormRequest
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

            'id',
            'category_id' => 'required|integer|exists:category,id',
            'is_private' => 'min:0|max:1',
            'title' => 'required',
            'text' => 'required',
            'image' => 'image',
        ];
    }
}
