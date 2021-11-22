<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{

    protected $guarded = ['id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
