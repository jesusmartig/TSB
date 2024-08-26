<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportCompany extends Model
{
    use HasFactory;

    protected $table = 'transport_companies';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nit',
        'digit',
        'businessName',
        'typePerson',
        'acronym',
        'nationalPersontype',
        'typesSociety',
        'economicSector',
        'department',
        'city',
        'codeFuec',
        'telephone',
        'phone',
        'direction',
        'email',
        'typeDocuments',
        'document',
        'names',
        'status',
    ];
}
