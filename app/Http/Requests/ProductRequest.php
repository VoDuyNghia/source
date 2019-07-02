<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        return [
            // 'name_category'        => 'required|min:5|max:50 |unique:collection,name,'.$request->id.',id',
            // 'position'             => 'required|unique:collection,position,'.$request->id.',id',


            'choose_id'         => 'required',
            'name'              => 'required|min:5|max:50 |unique:product,name,'.$request->id.',id',
            'detail'            => 'required|min:50|max:200',
            'description'       => 'required|min:100',
            // 'image_detail123'   => 'required',
            'collection_id'     => 'required',
            'district_id'       => 'required',
            'address'           => 'required',
            'price'             => 'required',
            'active'            => 'required',
        ];
    }
    public function messages() {
        return [
            'choose_id.required'          => 'Vui lòng chọn thể loại.',
            'collection_id.required'      => 'Vui lòng chọn danh mục.',
            'name.required'               => 'Vui lòng nhập tiêu đề tin',
            'name.min'                    => 'Tiêu đề tin trong khoảng từ 15 - 150 ký tự',
            'name.max'                    => 'Tiêu đề tin trong khoảng từ 15 - 150 ký tự',
            'name.unique'                 => 'Tiêu đề tin đã tồn tại',
            'detail.required'             => 'Vui lòng nhập chi tiết tin',
            'detail.min'                  => 'Chi tiết tin trong khoảng từ 50 - 150 ký tự',
            'detail.max'                  => 'Chi tiết tin trong khoảng từ 50 - 150 ký tự',
            'description.required'        => 'Vui lòng nhập nội dung tin',
            'description.min'             => 'Nội dung phải trên 100 ký tự',
            // 'image_detail123.required'    => 'Định dạng phải là hình ảnh',
            'district_id.required'        => 'Vui lòng chọn quận.',
            'address.required'            => 'Vui lòng nhập địa chỉ.',
            'price.required'              => 'Vui lòng nhập giá.',
            'active.required'             => 'Vui lòng chọn tình trạng bài viết.',
        ];
    }
}
