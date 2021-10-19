<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    protected $guarded = ['id'];

    public $dates = ['tgl_terbit'];
}
