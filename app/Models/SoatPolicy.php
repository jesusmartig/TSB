<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoatPolicy extends Model
{
    use HasFactory;

    protected $table = 'soat_policy';

    protected $primaryKey = 'id';

    protected $fillable = [
        'policyNumber',
        'expeditionDate',
        'startDateValidity',
        'expirationDate',
        'rateType',
        'insurerName',
        'status',
        'shares',
        'vehicle',
    ];

}
