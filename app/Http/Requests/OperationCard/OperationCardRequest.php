<?php

namespace App\Http\Requests\OperationCard;

use Illuminate\Foundation\Http\FormRequest;

class OperationCardRequest extends FormRequest
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
            //
            'affiliateCompany' => 'required',
            'expeditionDate' => 'required',
            'validitystartDate' => 'required',
            'expirationDate' => 'required',
            'operationcard' => 'required',
            'operationcardType' => 'required',
            'shares' => '',
            'vehicle' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'affiliateCompany' => 'Compañía afiliada',
            'expeditionDate' => 'Fecha expedición',
            'validitystartDate' => 'Fecha de inicio de validez',
            'expirationDate' => 'Fecha de caducidad',
            'operationcard' => 'Tarjeta de operación',
            'operationcardType' => 'Tipo de tarjeta de operación',
            'shares' => 'Pdf',
            'vehicle' => 'Vehículo',
        ];
    }
}
