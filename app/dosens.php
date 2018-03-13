<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosens extends Model
{
    protected $fillable = ['nama', 'nipd'];

    public function siswa()
    {
    	return $this->hasMany('App\siswas', 'id_dosens');
    }

    public $timestamps = true;
}
