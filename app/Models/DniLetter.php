<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DniLetter extends Model
{
    use HasFactory;

    protected $table = 'dni_letter';

    protected $fillable = [
        'letter'
    ];
}
