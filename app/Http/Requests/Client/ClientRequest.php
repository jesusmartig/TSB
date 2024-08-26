<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'password' => '',
            'typeDocument' => 'required',
            'numDocument' => 'required',
            'digit' => '',
            'expeditionDate' => 'required',
            'expeditionPlace' => 'required',
            'departament' => 'required',
            'city' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'telephone' => 'string',
            'cellphone' => 'string',
            'avatar' => '',
            'rol' => 'required',
            'transport' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombres y apellidos',
            'email' => 'Correo electronico',
            'password' => 'Contraseña',
            'rol' => 'ID del rol',
            'transport' => 'ID de la empresa de transporte',
            'typeDocument' => 'Tipo de documento',
            'numDocument' => 'Numero de documento',
            'digit' => 'Digito de verificacion',
            'expeditionDate' => 'Fecha de expedicion',
            'expeditionPlace' => 'Lugar de expedicion',
            'departament' => 'Departamento',
            'city' => 'Ciudad',
            'gender' => 'Genero',
            'address' => 'Direccion',
            'telephone' => 'Telefono',
            'cellphone' => 'Celular',
            'avatar' => 'Imagen de perfil',
        ];
    }
}
