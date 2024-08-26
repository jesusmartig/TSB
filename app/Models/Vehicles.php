<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'vehiclePlate',
        'transitLicense',
        'vehicleStatus',
        'typeService',
        'vehicleClass',
        'brand',
        'line',
        'model',
        'color',
        'serialNumber',
        'engineNumber',
        'chassisNumber',
        'vinNumber',
        'cylinderCapacity',
        'bodyType',
        'fuelType',
        'initialRegistrationDate',
        'transitAuthority',
        'doors',
        'LoadingCapacity',
        'vehicleGrossWeight',
        'seatedPassengerCapacity',
        'numberAxles',
        'proprietor',
        'documentType',
        'numDocument',
        'usId',
    ];
}
