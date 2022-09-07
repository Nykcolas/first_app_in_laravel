<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id'];

    public function Cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function produtos()
    {
        return $this->belongsToMany("App\Models\Item", "pedido_produtos",'pedido_id', "produto_id")->withPivot("created_at", "quantidade", "id");
    }
}
