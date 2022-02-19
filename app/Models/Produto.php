<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ["loja_id","nome","decricao","preco"];

    public function getPrecoAttribute(){
        return $this->attributes["preco"] / 100;
    }

    public function setPrecoAttribute($attr){
        return $this->attributes["preco"] = $attr * 100;
    }

    public function loja(){
        return $this->belongsTo(Loja::class);
    } 
}

