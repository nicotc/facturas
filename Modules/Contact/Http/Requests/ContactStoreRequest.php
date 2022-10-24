<?php

namespace Modules\Contact\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {




        return [
            'name' => ['required', 'string', 'max:45'],
            'last_name' => ['required', 'string', 'max:45'],
            'gender' => ['required', 'string', 'max:45'],
            'email' => ['required', 'email', 'max:45'],
            'phone_home' => ['required', 'string', 'max:45'],
            'phone_mobile' => ['required', 'string', 'max:45'],
            'address' => ['required', 'string', 'max:45'],
            'rif_type' => ['required', 'string', 'max:45'],
            'rif' => ['required', 'string', 'max:45'],
            'company_name' => ['required', 'string', 'max:45'],
            'company_phone' => ['required', 'string', 'max:45'],
            'company_email' => ['required', 'email', 'max:45'],
            'company_address' => ['required', 'string', 'max:45'],
            'work_address' => ['required', 'string', 'max:45'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'last_name.required' => 'El campo apellido es obligatorio',
            'gender.required' => 'El campo genero es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'phone_home.required' => 'El campo telefono de casa es obligatorio',
            'phone_mobile.required' => 'El campo telefono movil es obligatorio',
            'address.required' => 'El campo direccion es obligatorio',
            'rif_type.required' => 'El campo tipo de rif es obligatorio',
            'rif.required' => 'El campo rif es obligatorio',
            'company_name.required' => 'El campo nombre de la empresa es obligatorio',
            'company_phone.required' => 'El campo telefono de la empresa es obligatorio',
            'company_email.required' => 'El campo email de la empresa es obligatorio',
            'company_address.required' => 'El campo direccion de la empresa es obligatorio',
            'work_address.required' => 'El campo direccion de trabajo es obligatorio',
        ];


    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}