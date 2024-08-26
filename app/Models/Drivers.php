<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'typeDocument',
        'document',
        'expeditionplace',
        'expeditiondate',
        'nameandsurname',
        'gender',
        'departament',
        'city',
        'address',
        'email',
        'telephone',
        'cellphone',
        'banks',
        'citizenshipcard',
        'curriculumvitae',
        'status',
    ];
}
