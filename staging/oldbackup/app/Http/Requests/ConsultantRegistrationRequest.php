<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantRegistrationRequest extends FormRequest
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
        return [
            'fname' => 'required',
            'lname' => 'required',
            'designation' => 'required',
            'email' => 'required|unique:consultants,email',
            'contact' => 'required|unique:consultants,mobile',
            'company_name' => 'required',
            'company_size' => 'required',
            'company_location' => 'required',
            'industry' => 'required',
            'job_profile' => 'required',
            'gender' => 'required',
            'specialization' => 'required',
            'address' => 'required',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ];
    }
    public function messages()
    {
        return [
            'fname.required' => 'The First Name is Required',
            'lname.required' => 'The Last Name is Required',
            'designation.required' => 'The Designation Name is Required',
            'email.required' => 'The Email is Required',
            'email.unique' => 'The Email ID is Already taken',
            'contact.required' => 'The Mobile Number is Required',
            'contact.unique' => 'The Mobile Number is Already Taken',
            'company_name.required' => 'The Company Name is Required',
            'company_size.required' => 'The Company Size is Required',
            'company_location.required' => 'The Company Location is Required',
            'industry.required' => 'The Industry Name is Required',
            'job_profile.required' => 'The Job Profile is Required',
            'gender.required' => 'The Gender is Required',
            'specialization.required' => 'The Specialization is Required',
            'address.required' => 'The Address is Required',
            'password.required' => 'The Password is 6 digit Required',
            'confirm_password.required' => 'The Confirm Password do not match'
        ];
    }
}