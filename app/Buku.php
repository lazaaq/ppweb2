<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $guarded = ['id'];

    public $dates = ['tgl_terbit'];

    public function photos()
    {
        return $this->hasMany('App\Buku', 'id_buku', 'id');
    }
}
