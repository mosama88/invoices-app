<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name'=>'required|unique:products|min:3|max:200',
            'section_id'=>'nullable|exists:sections,id',
            'description'=>'nullable|min:3|max:200',
        ];
    }
    
    
    
    public function messages(): array
    {
        return [
            'product_name.required'=>'أسم المنتج مطلوب',
            'product_name.min'=>'يجب ان يكون أسم المنتج أكثر من 3 أحرف',
            'product_name.unique'=>'المنتج مسجل بالفعل',
            'product_name.max'=>'يجب ان يكون أسم المنتج أقل من 200 حرف',
            ########################################################
            'description.min'=>'يجب ان يكون حقل الملاحظات 3 رقم',
            'description.max'=>'يجب ان يكون حقل الملاحظات 200 رقم',
                   ];
    }

}