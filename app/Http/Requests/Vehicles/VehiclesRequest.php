<?php

namespace App\Http\Requests\Vehicles;

use Illuminate\Foundation\Http\FormRequest;

class VehiclesRequest extends FormRequest
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
            'vehiclePlate' => '',
            'transitLicense' => '',
            'typeService' => 'required',
            'vehicleClass' => 'required',
            'brand' => 'required',
            'line' => 'required',
            'model' => 'required',
            'color' => 'required',
            'serialNumber' => '',
            'engineNumber' => 'required',
            'chassisNumber' => '',
            'vinNumber' => '',
            'cylinderCapacity' => 'required',
            'bodyType' => 'required',
            'fuelType' => 'required',
            'initialRegistrationDate' => '',
            'transitAuthority' => '',
            'doors' => 'required',
            'LoadingCapacity' => 'required',
            'vehicleGrossWeight' => 'required',
            'seatedPassengerCapacity' => 'required',
            'numberAxles' => 'required',
            'proprietor' => 'required',
            'documentType' => 'required',
            'numDocument' => 'required',
            'usId' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'vehiclePlate' => 'Placa del vehiculo',
            'transitLicense' => 'Licencia de transito',
            'typeService' => 'Tipo Servicio',
            'vehicleClass' => 'Clase de vehículo',
            'brand' => 'Marca',
            'line' => 'Línea',
            'model' => 'Modelo',
            'color' => 'Color',
            'serialNumber' => 'número de serie',
            'engineNumber' => 'Número de motor',
            'chassisNumber' => 'Número de chasis',
            'vinNumber' => 'Número VIN',
            'cylinderCapacity' => 'capacidad del cilindro',
            'bodyType' => 'Tipo de cuerpo',
            'fuelType' => 'Tipo de combustible',
            'initialRegistrationDate' => '>Fecha de registro inicial',
            'transitAuthority' => 'Autoridad de tránsito',
            'doors' => 'Puertas',
            'LoadingCapacity' => 'Capacidad de carga',
            'vehicleGrossWeight' => 'Peso bruto del vehículo',
            'seatedPassengerCapacity' => 'Capacidad de Pasajero sentado',
            'numberAxles' => 'número de Ejes',
            'proprietor' => 'Nombre del propietario',
            'documentType' => 'Tipo de Documento',
            'numDocument' => 'Numero de documento',
        ];
    }
}
