<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $table = "experiencias";
    protected $fillable = [
        'nombre',
        'descripcion',
        'empresa_id',
        'id_user',
        'fecha_inicio',
        'fecha_fin'
    ];
    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime'
    ];
    

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
