<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class PatientRequest extends FormRequest
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
            'password'  => 'required|confirmed'
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
