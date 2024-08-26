<?php

namespace App\Http\Requests\TransportCompany;

use Illuminate\Foundation\Http\FormRequest;

class TransportCompanyRequest extends FormRequest
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
            'nit' => 'required',
            'digit' => 'required',
            'businessName' => 'required',
            'typePerson' => 'required',
            'nationalPersontype' => 'required',
            'typesSociety' => 'required',
            'economicSector' => 'required',
            'department' => 'required',
            'city' => 'required',
            'codeFuec' => 'required',
            'phone' => 'required',
            'telephone' => 'string',
            'direction' => 'required',
            'email' => 'required',
            'typeDocuments' => 'required',
            'document' => 'required',
            'names' => 'required',
        ];
    }


    public function attributes()
    {
        return [
            'nit' => 'Nit',
            'digit' => 'Dígito',
            'businessName' => 'Razón social',
            'typePerson' => 'Tipo persona',
            'nationalPersontype' => 'Tipo de persona nacional',
            'typesSociety' => 'tipos sociedad',
            'economicSector' => 'Sector económico',
            'department' => 'Departamento',
            'city' => 'Ciudad',
            'codeFuec' => 'Número de resolución',
            'phone' => 'Celular',
            'direction' => 'Dirección',
            'email' => 'Correo electrónico',
            'typeDocuments' => 'Tipo documentos',
            'document' => 'Documento',
            'names' => 'Nombre del representante legal',
        ];
    }
}
