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
        return $this->hasMany('App\Galeri', 'id_buku', 'id');
    }

    public function komentar()
    {
        return $this->hasMany('App\Komentar', 'buku_id', 'id');
    }
}
