<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesSociety extends Model
{
    use HasFactory;

    protected $table = 'types_society';

    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'prefix'
    ];
}
