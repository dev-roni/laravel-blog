<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class postValidation extends FormRequest
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
            'post_title'    => 'required|string|max:250',
            'post_category' => 'required|string|max:100',
            'post_content'  => 'required|string',
        ];
    }

    public function massage(): array
    {
        return [
            'post_title.required'    => '! পোষ্টের টাইটেল দিন',
            'post_title.string'      => '! পোষ্ট টাইটেল অক্ষরের হতে হবে',
            'post_title.max'         => '! পোষ্ট টাইটেল ২৫০ অক্ষরের বেশি হতে পারবে না',

            'post_category.required' => '! পোষ্ট ক্যাটাগরি দিন',
            'post_category.string'   => '! পোষ্ট ক্যাটাগরি অক্ষরের হতে হবে',
            'post_category.max'      => '! পোষ্ট ক্যাটাগরি ১০০ অক্ষরের বেশি হতে পারবে না',

            'post_content.required'  => '! পোষ্ট কন্টেন্ট দিন',
            'post_content.string'    => '! পোষ্ট কন্টেন্ট অক্ষরের হতে হবে',
        ];
    }
}
