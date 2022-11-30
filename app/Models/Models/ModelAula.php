<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAula extends Model
{
    protected $table='aulas';
    protected $fillable=['id_user', 'material', 'nome_professor', 'data', 'início_aula', 'fim_aula'];

    public function relUsers(){
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }
}
