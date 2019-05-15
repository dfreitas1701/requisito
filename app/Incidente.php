<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    protected $fillable = ['titulo', 'descricao', 'criticidade_id', 'tipoincidente_id', 'status'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'incidente';

    public function tipoincidente()
    {
        return $this->belongsTo('App\tipoincidente');
    }
    
    public function criticidade()
    {
        return $this->belongsTo('App\criticidade');
    }
}
