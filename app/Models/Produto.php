<?php

namespace App\Models;

use App\Traits\Hashid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes, Hashid;

    protected $table = 'produtos';

    protected $fillable = ['nome_produto', 'sku', 'path_foto', 'preco', 'estoque'];
}
