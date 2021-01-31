<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Rules\Hankaku;
use Illuminate\Foundation\Http\FormRequest;

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
        // $hoge = new Hankaku;
        // dd($hoge);

        return [
            'Twitter_user' => ['nullable', new Hankaku, 'not_in:@' . str_replace('@', '', $this->input('Twitter_user'))],
            'tweet_id' => ['nullable', 'integer'],
            'gate_name' => ['required', 'string', 'max:255', new Hankaku],
            'dl_url' => ['required', 'url'],
            'youtube_channel_id' => ['nullable', 'alpha_dash', new Hankaku],
        ];
        //カスタムバリデーションについて↓
        //laravel/resources/lang/ja/validation.phpに記載済み
    }
}
