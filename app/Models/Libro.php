<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = [
        'titulo',
        'autor_id',
        'anio',
        'precio'
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
