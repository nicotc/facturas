<?php

namespace Modules\Budget\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBudgetRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => 'required',
            'contacts_address_id' => ['required', 'exists:contacts_address,id']
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'El campo descripción es obligatorio',
            'contacts_address_id.required' => 'El campo dirección es obligatorio',
            'contacts_address_id.exists' => 'La dirección seleccionada no existe'
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