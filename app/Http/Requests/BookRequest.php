<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
      $genres = "History,Children,Fantasy,Drama,Romance,Art,Diary,Biography,
                 History,Math,Science,Self help,Travel,Health,Cookbook,Journal
                 ,Poetry,Political";
        return [
            'name' => ['required','string','min:3','max:100'],
            'authorname' => ['required','string','min:3','max:20'],
            'isbn' => ['regex:/(^(\d+-?)+\d+$)/u'],
            'price' => 'numeric',
            'genres'=> ['in:'.$genres]
        ];
    }

    public function messages()
    {
    return [
      'isbn.regex' => 'isbn should match format 908-5877-54-45'

    ];
    }
}
