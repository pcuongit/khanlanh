<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rule = ['id_category' => 'required', 'name' => 'required','price' => 'required', 'discount' => 'required', 'description' => 'required'];
        if($request->all()['_method'] === 'POST') {
            $rule += ['image_url' => 'required'];
        } else {
            $rule += ['image_url' => 'nullable'];
        }
        
        return $rule;
    }

    public function messages() {
        return [
            'id_category.required' => 'vui lòng chọn danh mục',
            'name.required' => 'vui lòng nhập tên sản phẩm',
            'price.required' => 'vui lòng nhập giá gốc',
            'discount.required' => 'vui lòng nhập % khuyến mãi',
            'description.required' => 'vui lòng nhập mô tả sản phẩm',
            'image_url.required' => 'vui lòng chọn ảnh sản phẩm'
        ];
    }
}