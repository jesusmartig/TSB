<?php

namespace App\Http\Requests\TypeDocuments;

use Illuminate\Foundation\Http\FormRequest;

class TypeDocumentsRequest extends FormRequest
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
            'name' => 'required',
            'prefix' => 'required',
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'Tipo de documento',
            'prefix' => 'Prefijo',
        ];
    }
}
