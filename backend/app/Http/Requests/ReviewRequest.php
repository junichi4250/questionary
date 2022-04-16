<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'gender' => 'required',
            'age_id' => 'required',
            'email' => 'required',
            'score' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '氏名',
            'age_id' => '年代',
            'email' => 'メールアドレス',
            'score' => '評価',
        ];
    }
}
