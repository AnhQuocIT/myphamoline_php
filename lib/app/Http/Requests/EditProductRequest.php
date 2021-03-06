<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'listImg.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'chooseImg.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(){
        return [
            //
            'listImg.unique'=>'Ảnh không hợp lệ! (Vui lòng chọn ảnh: jpeg,png,jpg,gif,svg)',
            'chooseImg.unique'=>'Ảnh không hợp lệ! (Vui lòng chọn ảnh: jpeg,png,jpg,gif,svg)',
        ];
    }
}
