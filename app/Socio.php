<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $fillable = ['nome', 'clube-id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'socios';

    public function clube()
    {
        return $this->belongsTo('App\Clube');
    }

}
