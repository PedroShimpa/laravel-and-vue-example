<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fofocas extends Model
{
    use HasFactory;

    protected $table = 'fofocas';

    protected $fillable = [
        'titulo',
        'conteudo',
        'user_id',
        'anonima'
    ];
}
