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
            'post_img'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1048',
            'post_status'   => 'required|in:draft,pending',
            'author'        => 'nullable|integer',
            'slug'          => 'required|string|max:255|unique:posts,slug',
            'clicked'       => 'nullable|integer',
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

            'post_img.image' => 'শুধুমাত্র ছবি আপলোড করুন',
            'post_img.mimes' => 'jpg, jpeg, png অথবা webp ফাইল হতে হবে',
            'post_img.max' => 'ছবির সাইজ ২MB এর বেশি হতে পারবে না',

            'post_status.required' => 'স্ট্যাটাস নির্বাচন করুন',
            'post_status.in' => 'সঠিক স্ট্যাটাস নির্বাচন করুন',

            'author.required' => 'অথরের নাম দিন',
            'author.max' => 'অথরের নাম ১০০ অক্ষরের বেশি হতে পারবে না',

            'slug.required' => 'Slug আবশ্যক',
            'slug.unique' => 'এই slug ইতিমধ্যে ব্যবহার করা হয়েছে',

            'clicked.integer' => 'Clicked সংখ্যা হতে হবে',
            'clicked.min' => 'Clicked 0 এর কম হতে পারবে না',
        ];
    }
}
