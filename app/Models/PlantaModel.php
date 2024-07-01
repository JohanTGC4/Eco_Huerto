<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantaModel extends Model{

    use HasFactory;

    protected $table = 'planta';
    protected $primaryKey = 'id_planta';
    protected $fillable = ['nombre', 'imagen', 'descripcion', 'categoria_planta_id_categoriaplanta'];
}