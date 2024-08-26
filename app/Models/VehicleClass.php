<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleClass extends Model
{
    use HasFactory;

    protected $table = 'vehicle_class';

    protected $primaryKey = 'id';

    protected $fillable = [
        'prefix',
        'className'
    ];

}
