<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }
    public function createOrUpdate($data){

        $validator = Validator::make($data, [
            'salutation' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'speciality' => 'required',
            'consultation_type' => 'required',
            'website' => 'required',
            'bio' => 'required',
            'employment' => 'required',
            'education' => 'required'
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
