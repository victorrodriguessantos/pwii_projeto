<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

    use HasFactory;

    protected $table = 'tbcategoria';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = ['name_categoria'];


    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id_categoria');
    }}