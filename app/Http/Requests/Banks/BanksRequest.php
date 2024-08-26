<?php

namespace App\Http\Requests\Banks;

use Illuminate\Foundation\Http\FormRequest;

class BanksRequest extends FormRequest
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
            'banksName' => 'required',
        ];
    }


    public function attributes()
    {
        return [
            'banksName' => 'Nombre del banco',
        ];
    }
}
