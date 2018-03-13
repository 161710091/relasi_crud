<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class walis extends Model
{
    protected $fillable = ['nama', 'id_siswa'];

    public function siswa()
    {
    	return $this->belongsTo('App\siswas', 'id_siswa');
    }

    public $timestamps = true;
}
