<?php

namespace App\Http\Requests\Drivers;

use Illuminate\Foundation\Http\FormRequest;

class DriversRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'typeDocument' => 'required',
            'document' => 'required',
            'expeditionplace' => 'required',
            'expeditiondate' => 'required',
            'nameandsurname' => 'required',
            'gender' => 'required',
            'departament' => 'required',
            'city' => 'required',
            'address' => 'required',
            'email' => 'required',
            'telephone' => '',
            'cellphone' => '',
            'banks' => 'required',
            'Name' => 'required',
            'dateadmission' => 'required',
            'shares' => 'required',
            'driver' => 'required',
        ];
    }
}
