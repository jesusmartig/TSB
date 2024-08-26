<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CivilResponsabilityPolicies extends Model
{
    use HasFactory;

    protected $table = 'civil_responsibility_policies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'policyNumber',
        'expeditionDate',
        'startDateValidity',
        'expirationDate',
        'insurerName',
        'policyType',
        'status',
        'takerDocumentType',
        'takerDocumentNumber',
        'shares',
        'vehicle',
    ];
}
