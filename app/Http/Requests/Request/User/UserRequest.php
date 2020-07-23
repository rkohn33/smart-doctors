<?php

namespace App\Http\Requests\Request\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserRequest extends FormRequest
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
    
    public function login($data){

        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        return $validator;
    }

    public function register($data){

        $validator = Validator::make($data, [
            'first_name'=> 'required',
            'last_name' => 'required',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required',
            'password'  => 'required|confirmed',
            'address' => 'required',
            'speciality' => 'required',
            'city' => 'required',
            'state' => 'required',
            'medical_registration' => 'required',
            'medical_degree' => 'required',
            'medical_proof' => 'required'
        ]);

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
