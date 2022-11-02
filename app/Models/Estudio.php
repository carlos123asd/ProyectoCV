<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;
    protected $table = "estudios";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'nombre',
        'grado',
        'id_user',
        'fecha_inicial',
        'fecha_final'
    ];
    protected $casts = [
        'fecha_inicial' => 'datetime',
        'fecha_final' => 'datetime'
    ];
}
