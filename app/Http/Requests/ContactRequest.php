<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'txtProductName' => ['required', 'string', 'min:1', 'max:25'],
            'drpCompanyId' => ['required', 'string', 'min:1', 'max:25'],
            'numPrice' => ['required', 'numeric', 'min:0'],
            'numStock' => ['required', 'numeric', 'min:0'],
            'areaComment' => ['nullable'],
            'drpImgPath' => ['nullable'],
        ];
    }
    public function messages()
    {
        return [
            'txtProductName.required' => '商品名は必須項目です。',
            'drpCompanyId.required' => 'メーカーは必須項目です。',
            'numPrice.required' => '価格は必須項目です。',
            'numStock.required' => '在庫数は必須項目です。'
        ];
    }
}
