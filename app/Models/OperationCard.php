<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationCard extends Model
{
    use HasFactory;

    protected $table = 'operation_card';

    protected $primaryKey = 'id';

    protected $fillable = [
        'affiliateCompany',
        'modeTransport',
        'serviceModality',
        'actionRatio',
        'expeditionDate',
        'validitystartDate',
        'expirationDate',
        'operationcard',
        'status',
        'operationcardType',
        'shares',
        'vehicle',
    ];
}
