<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driveraffiliations extends Model
{
    use HasFactory;

    protected $table = 'driver_affiliations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'Name',
        'dateadmission',
        'shares',
        'status',
        'driver',
    ];
}
