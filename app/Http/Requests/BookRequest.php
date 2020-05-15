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
      $genres = 'History,Children,Fantasy,Drama,Romance,Art,Diary,Biography,
                 History,Math,Science,Self help,Travel,Health,Cookbook,Journal
                 ,Poetry,Political';
        return [
            'name' => ['required','string','min:3','max:20'],
            'authorname' => ['required','string','min:3','max:20'],
            'isbn' => ['regex:/([0-9]{3}-[0-9]{4}-[0-9]{2}-[0-9]{2})/u'],
            'price' => 'numeric',
            'genres'=> ['in:'.$genres]
        ];
    }
}
