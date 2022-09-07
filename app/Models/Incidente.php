<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'area_id',
        'importancia_id',
        'tipo_id',
        'equipo_id',
        'user_id'
    ];

    // ** importancia o gravedad del incidente
    public function importancia()
    {
        return $this->belongsTo(Importancia::class);
    }


    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}
