<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required',
            'director' => 'required|max:80',
            'length' => 'required|numeric',
            'premiere_date' => 'required|numeric|min:1900|max:2100',
            'actors' => 'required',
            'types' => 'required',
        ];
    }
}
