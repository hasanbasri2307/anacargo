<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                 return [
                    //
                    "name" => "required",
                    "email" => 'required|email|unique:users,email|max:50',
                    "type" => "required",
                    "status" => "required",
                    "password" => 'required|min:6|confirmed',
                    "password_confirmation" => "required"
                ];

                break;

            case 'PATCH' :
                 return [
                    //
                    "name" => "required",
                    "type" => "required",
                    "status" => "required",
                ];
                break;
            
            default:
                # code...
                break;
        }
       
    }

    public function messages(){
        return [
            "name.required" => "Nama harus diisi.",
            "email.required" => "Email harus diisi.",
            "email.email" => "Format email salah.",
            "email.unique" => "Email sudah digunakan.",
            "email.max" => "Email maksimal 50 karakter",
            "type.required" =>"Tipe harus diisi.",
            "status.required" => "Status harus diisi.",
            'password_confirmation.required' => 'Konfirmasi password harus diisi.',
            'password.confirmed' => 'Password dan konfirmasi password harus sama.',
            'password.min' => 'Password minimal :min karakter.'
        ];
    }
}
