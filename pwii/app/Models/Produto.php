<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

    use HasFactory;

    protected $table = 'tbprodutos';
    protected $primaryKey = 'id_produto';


// Model para aceitar inserções em massa no banco
    protected $fillable = ['name_produto', 'quantidade', 'valor', 'id_categoria'];

    public $timestamps = false; // Isso desativa o uso de created_at e updated_at

     // Relacionamento com o modelo Categoria

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    

}