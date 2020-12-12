<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Contracts\Validation\Validator;
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
            "Twitter_user" =>['nullable','string'],
            "tweet_id" =>['nullable','integer'],
            "gate_name" =>['required','string','max:255'],
            "dl_url" =>['required','url'],
        ];

    }

    public function attributes()
{
    return [
        'Twitter_user' => 'ツイッターユーザー名',
        'tweet_id' => 'ツイート_id',
        // 'gate_name' => 'ラジオボタン',
    ];
}
    public function messages()
{
    return [
        'tweet_id.integer' =>'ツイートidのみ入力してください',
        'gate_name.required' =>'gatenameは入力必須です',
        'gate_name.string' =>'gatenameは英数字のみ入力可能です',
        'gate_name.max:255' => 'gatenameは255文字以内で入力してください',
        'dl_url.required' =>'DL_urlは入力必須です',
        'dl_url.url' =>'DL_urlにはURLを入力してください',


    ];
}
}
