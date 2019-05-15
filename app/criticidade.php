<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class criticidade extends Model
{
    protected $fillable = ['nome'];
    protected $guarded = ['id'];
    protected $table = 'criticidade';
    
    public function incidente()
    {
        return $this->hasMany('App\Incidente');
    }
    
}
