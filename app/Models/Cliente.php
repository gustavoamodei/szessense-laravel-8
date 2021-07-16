<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nome','email','rua','celular','estado','cidade','bairro','cep'];
    protected $table = 'cliente';
    protected $dates=['deleted_at'];
}
