<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialsecurity extends Model
{
    use HasFactory;

    protected $table = 'social_security';

    protected $primaryKey = 'id';

    protected $fillable = [
        'contributor',
        'contributorDocument',
        'form',
        'typesReturns',
        'pensionperiod',
        'healthperiod',
        'shares',
        'status',
        'driver',
    ];
}
