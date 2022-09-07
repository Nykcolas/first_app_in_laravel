<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $table =  "produtos";
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function ItemDetalhe()
    {
        return $this->hasOne('App\Models\ItemDetalhe', "produto_id", "id");
    }
    
    public function Fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function pedidos() {
        return $this->belongsToMany("App\Models\Pedido", "pedido_produtos", "produto_id", "pedido_id");
    }
}
