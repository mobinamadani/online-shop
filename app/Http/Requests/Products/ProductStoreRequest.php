<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => 1,
            'user_ip' => $this->ip(),
            'user_agent' => $this->userAgent(),
            // 'action' => 'create',
            // 'model' => 'Product'
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'cost' => ['nullable', 'integer','min:100', 'max:100000'],
            'count' => ['required', 'integer', 'max:1000'],
            'description' => ['nullable', 'min:10'],
            'user_id' => ['required'],
            'user_agent' => ['required'],
            'user_ip' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'array'],
            'tags.*' => ['exists:tags,id']

        ];
    }

    //define custome messages for validation by overriding the messages method
    public function messages(): array
    {
        return [
            'name.required' => 'وارد کردن نام محصول الزامی می باشد',
            'cost.integer' => 'قیمت محصول باید یک عدد باشد',
            'cost.min' => 'قیمت باید حداقل :min باشد',
            'count.required' => 'وارد کردن تعداد محصول الزامی می باشد',
        ];
    }
}
