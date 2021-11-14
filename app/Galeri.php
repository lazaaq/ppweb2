<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'gallery';
    protected $guarded = ['id'];

    public function albums()
    {
        return $this->belongsTo('App\Album', 'id_album', 'id');
    }
    public function bukus()
    {
        return $this->belongsTo('App\Buku', 'id_buku', 'id');
    }
}
