<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oleo_Base extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome','ml','valor_compra','preco_ml','validade'];
    protected $table = 'oleo_base';
    protected $dates=['deleted_at'];
}
