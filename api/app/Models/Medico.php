<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['pessoa_id', 'crm', 'especialidade'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}
