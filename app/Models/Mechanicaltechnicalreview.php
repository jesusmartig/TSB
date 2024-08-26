<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanicaltechnicalreview extends Model
{
    use HasFactory;

    protected $table = 'mechanical_technical_review';

    protected $primaryKey = 'id';

    protected $fillable = [
        'revisionType',
        'expeditionDate',
        'effectiveDate',
        'cdaSssuesRtm',
        'valid',
        'certificate',
        'shares',
        'vehicle',
        'status',
    ];
}
