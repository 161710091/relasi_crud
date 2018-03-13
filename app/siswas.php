<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswas extends Model
{
    protected $fillable = ['nama', 'nis', 'id_dosen'];

    public function wali()
    {
    	return $this->hasOne('App\walis', 'id_siswa');
    }

    public function dosen()
    {
    	return $this->belongsTo('App\dosens', 'id_dosen');
    }

    public $timestamps = true;
}
