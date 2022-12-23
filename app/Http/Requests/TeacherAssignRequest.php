<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherAssignRequest extends FormRequest
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
        $this->only('data','student_id','teacher_id');
        return [
            'data.*' =>'required',
            'data.*.student_id' =>'required|int',
            'data.*.teacher_id' =>'required|int',
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
            'data.required' => 'Fields are required',
            'data.student_id.required' => 'Student Name is required!',
            'data.student_id.int' => 'Field must integer!',
            'data.teacher_id.required' => 'Teacher Name is required!',
            'data.teacher_id.int' => 'Field must be integer!',
        ];
    }
}
