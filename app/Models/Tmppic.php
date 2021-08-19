<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmppic extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_filename',
        'filename',
        'userid',
    ];
}
