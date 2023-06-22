<?php

namespace App\Http\Requests;

use App\Models\Product;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // $product = $this->route('product', new Product());
        $product = $this->route('product', 0);
        $id = $product? $product->id : 0;

        return [
            'name' => 'required|max:255|min:3',
            'slug' => "required|unique:products,slug,{$id}",
            // 'slug' => "required|unique:products,slug,{$id}",
            'category_id' => 'nullable|int|exists:categories,id',
            'description' => 'nullable|string',
            'short_description' => 'string|max:500',
            'price' => 'required|numeric|min:0',
            'compare_price' => 'nullable|numeric|min:0|gt:price',       //gt = greater than  // gte = greater than or equal =
            'image' => 'nullable|image|dimensions:min_width=100,min_height=100,|max:500',   // 500KB  // 1024KB = 1MB
            'status' => 'required|in:active,draft,archived',
            // 'image' => 'file|mimetypes:image/png,image/jpg,image/jpeg,image/gif',   /// more secure than mimes and it used for imaes/files/videos
            'gallery' => 'nullable|array',
            'gallery.*' => 'image||dimensions:min_width=100,min_height=100,|max:1024',        
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute field is required!!',           // :attribute = field name
            'unquie' => 'The value already exists!',
            'name.required' => 'The product name is mandatory!', // speciallies the field name
        ];
    }
}
