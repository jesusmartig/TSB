<?php

namespace App\Http\Requests\Mechanicaltechnicalreview;

use Illuminate\Foundation\Http\FormRequest;

class MechanicaltechnicalreviewRequest extends FormRequest
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
            'revisionType' => '',
            'expeditionDate' => 'required',
            'effectiveDate' => 'required',
            'cdaSssuesRtm' => 'required',
            'valid' => 'required',
            'certificate' => 'required',
            'shares' => '',
            'vehicle' => 'required',
            'status' => '',
        ];
    }

    public function attributes()
    {
        return [
            'revisionType' => 'Tipo de revisión',
            'expeditionDate' => 'Fecha expedición',
            'effectiveDate' => 'Fecha vigencia	',
            'cdaSssuesRtm' => 'CDA expide RTM',
            'valid' => 'Vigente',
            'certificate' => 'Nro. certificado',
            'shares' => 'Pdf',
            'vehicle' => 'vehículo',
            'status' => 'Estado',
        ];
    }
}
