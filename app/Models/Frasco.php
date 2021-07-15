<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frasco extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome','descricao','preco'];
    protected $table = 'frasco';
    protected $dates=['deleted_at'];
}
