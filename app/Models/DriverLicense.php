<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLicense extends Model
{
    use HasFactory;

    protected $table = 'driver_license';

    protected $primaryKey = 'id';

    protected $fillable = [
        'licenseno',
        'issuedate',
        'expirationdate',
        'category',
        'issuingtransitagencies',
        'driverrestrictions',
        'shares',
        'status',
        'driver',
    ];
}
