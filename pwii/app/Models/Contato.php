<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model {

    use HasFactory;

    protected $table = 'tbcontato';

    protected $primaryKey = 'id_contato';

    public $timestamps = false;

    protected $fillable = ['name_contato', 'telefone', 'endereco'];
}