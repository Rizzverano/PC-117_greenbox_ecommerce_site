<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegefruit extends Model
{
    protected $table = 'vegefruits';
    protected $primaryKey = 'id';

    protected $fillable =
    [
        'name',
        'image',
        'intro',
        'description',
        'ingred_one',
        'ingred_two',
        'ingred_three',
        'ingred_four',
        'ingred_five',
        'ingred_six',
        'ingred_seven',
        'ingred_eight',
        'ingred_nine',
        'ingred_ten',
        'price'
    ];

    use HasFactory;
}
