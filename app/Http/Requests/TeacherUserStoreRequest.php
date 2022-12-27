<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherUserStoreRequest extends FormRequest
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
        $this->only('name','email','password','address','password_confirmation');
        return [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|required_with:password_confirmation|same:password_confirmation|min:8',
            'password_confirmation' =>'required|min:8',
            'address' => 'required|max:100',
            'experience' => 'required|max:100',
            'data.*' =>'required',
            'data.*.subject_id' =>'required|int',
            //'data.*.teacher_id' =>'required|int',
            'profile_picture' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
            'address.required' => 'Address is required!',
            'experience.required' => 'Experience is required!',
            'subject_id.required' => 'Subject Expertise is required!',
            'password.required' => 'Password is required!',
            'password.confirmed' => 'Password does not match!'
        ];
    }
}
