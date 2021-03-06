<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clube extends Model
{
    protected $fillable = ['nome'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'clubes';

    public function socios()
    {
        return $this->hasMany('App\Socio');
    }
}
