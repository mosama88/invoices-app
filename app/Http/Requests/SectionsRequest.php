<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionsRequest extends FormRequest
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
            'section_name'=>'required|unique:sections|min:3|max:200',
            'description'=>'nullable|min:3|max:200',
            'created_by'=>'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'section_name.required'=>'أسم القسم مطلوب',
            'section_name.min'=>'يجب ان يكون أسم القسم أكثر من 3 أحرف',
            'section_name.unique'=>'القسم مسجل بالفعل',
            'section_name.max'=>'يجب ان يكون أسم القسم أقل من 200 حرف',
            ########################################################
            'description.min'=>'يجب ان يكون حقل الموبايل 3 رقم',
            'description.max'=>'يجب ان يكون حقل الموبايل 200 رقم',
                   ];
    }

}
