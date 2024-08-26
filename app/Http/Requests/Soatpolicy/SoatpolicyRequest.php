<?php

namespace App\Http\Requests\Soatpolicy;

use Illuminate\Foundation\Http\FormRequest;

class SoatpolicyRequest extends FormRequest
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
            'rateType' => 'required',
            'insurerName' => 'required',
            'status' => '',
            'shares' => '',
            'vehicle' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'policyNumber' => 'Número de póliza',
            'expeditionDate' => 'Fecha expedición',
            'startDateValidity' => 'Fecha de inicio vigencia',
            'expirationDate' => 'Fecha de vencimiento',
            'rateType' => 'Tarifa',
            'insurerName' => 'Nombre de la aseguradora',
            'status' => 'Estado',
            'vehicle' => 'vehículo',
        ];
    }
}
