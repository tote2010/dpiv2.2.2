<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ValorDolar extends Model
{
    use HasFactory;

    protected $table = 'valor_dolars';

    protected $dates = ['created_at'];

    protected $fillable = [
        'valor',
    ];
}
