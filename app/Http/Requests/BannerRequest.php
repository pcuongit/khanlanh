<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        $request = $this->request;
        $rule = ['priorty' => 'required'];
        if($request->all()['_method'] === 'POST') {
            $rule += ['image_url' => 'required'];
        } else {
            $rule += ['image_url' => 'nullable'];
        }
        
        return $rule;
    }

    public function messages() {
        return [
            'priorty.required' => 'vui lòng nhập độ ưu tiên',
            'image_url.required' => 'vui lòng chọn ảnh'
        ];
    }
}