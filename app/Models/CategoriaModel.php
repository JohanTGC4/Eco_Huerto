<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model{
    
    use HasFactory;

    protected $primaryKey = "id_categoriaplanta";
    protected $table = 'categoria_planta';
    protected $fillable = ['nombre'];
}