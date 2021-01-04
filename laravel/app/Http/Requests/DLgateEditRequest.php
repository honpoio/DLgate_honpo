<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
<<<<<<< HEAD
<<<<<<< HEAD
=======
// use Illuminate\Contracts\Validation\Validator;
>>>>>>> test
=======
>>>>>>> DB_redesign
class DLgateEditRequest extends FormRequest
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
<<<<<<< HEAD
<<<<<<< HEAD
            "Twitter_user" =>['nullable','string','not_in:@'.str_replace( '@','',$this->input('Twitter_user'))],
=======
            "Twitter_user" =>['nullable','string'],
>>>>>>> test
=======
            "Twitter_user" =>['nullable','string','not_in:@'.str_replace( '@','',$this->input('Twitter_user'))],
>>>>>>> DB_redesign
            "tweet_id" =>['nullable','integer'],
            "gate_name" =>['required','string','max:255'],
            "dl_url" =>['required','url'],
        ];
        //カスタムバリデーションについて↓
        //laravel/resources/lang/ja/validation.phpに記載済み
    }

<<<<<<< HEAD
<<<<<<< HEAD

=======
    
>>>>>>> test
=======

>>>>>>> DB_redesign
}
