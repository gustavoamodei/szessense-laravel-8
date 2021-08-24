<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oleo_Essencial extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome','ml','valor_compra','preco_gota','validade'];
    protected $table = 'oleo_essencial';
    protected $dates=['deleted_at'];
}
