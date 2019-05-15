<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoincidente extends Model
{
    protected $fillable = ['nome'];
    protected $guarded = ['id'];
    protected $table = 'tipoincidente';
    
    public function incidente()
    {
        return $this->hasMany('App\Incidente');
    }
    
}
