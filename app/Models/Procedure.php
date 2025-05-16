<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    protected $table = 'procedures';
    protected $primaryKey = 'id';

    protected $fillable =
    [
        'name',
        'image',
        'type',
        'guide'
    ];

    use HasFactory;
}
