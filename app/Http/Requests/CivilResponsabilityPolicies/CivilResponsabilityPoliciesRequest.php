<?php

namespace App\Http\Requests\CivilResponsabilityPolicies;

use Illuminate\Foundation\Http\FormRequest;

class CivilResponsabilityPoliciesRequest extends FormRequest
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
            'policyNumber' => 'required',
            'expeditionDate' => 'required',
            'startDateValidity' => 'required',
            'expirationDate' => 'required',
            'insurerName' => 'required',
            'policyType' => 'required',
            'status' => '',
            'takerDocumentType' => '',
            'takerDocumentNumber' => 'required',
            'shares' => '',
            'vehicle' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'policyNumber' => 'Número de póliza',
            'expeditionDate' => 'Fecha expedición',
            'startDateValidity' => 'Fecha de inicio validez',
            'expirationDate' => 'Fecha de vencimiento',
            'insurerName' => 'Nombre de la aseguradora',
            'policyType' => 'Tipo de política',
            'status' => 'Estado',
            'takerDocumentType' => 'Tipo de documento Tomador',
            'takerDocumentNumber' => 'Número de documento del tomador',
            'shares' => 'PDF',
            'vehicle' => 'vehículo',
        ];
    }
}
