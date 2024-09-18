<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8',
                    'age' => 'nullable|integer',
                    'phone' => 'required|string',
                    'ward_id' => 'nullable|string|exists:wards,id',
                    'district_id' => 'nullable|string|exists:districts,id',
                    'city_id' => 'nullable|string|exists:cities,id',
                    'postal_code' => 'nullable|string',
                    'country' => 'nullable|string',
                    'date_of_birth' => 'nullable|date',
                    'profile_picture' => 'nullable|image|max:2048',
                    'gender' => 'nullable|string|in:male,female,other',
                ];
                
            case 'PUT':
            case 'PATCH':
                $userId = $this->route('id');
                return [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email,' . $userId,
                    'password' => 'nullable|string|min:8',
                    'age' => 'nullable|integer',
                    'phone' => 'nullable|string',
                    'ward_id' => 'nullable|string|exists:wards,id',
                    'district_id' => 'nullable|string|exists:districts,id',
                    'city_id' => 'nullable|string|exists:cities,id',
                    'postal_code' => 'nullable|string',
                    'country' => 'nullable|string',
                    'date_of_birth' => 'nullable|date',
                    'profile_picture' => 'nullable|image|max:2048',
                    'gender' => 'nullable|string|in:male,female,other',
                ];
                
            default:
                return [];
        }
    }

    /**
     * Get the custom error messages for the validator.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi ký tự.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là một chuỗi ký tự.',
            'profile_picture.image' => 'Tệp tải lên phải là một hình ảnh.',
            'profile_picture.max' => 'Hình ảnh không được vượt quá 2MB.',
            'gender.in' => 'Giới tính không hợp lệ.',
        ];
    }
}