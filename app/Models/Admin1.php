<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User1; // Pastikan namespace User1 sesuai dengan struktur direktori

class Admin1 extends Model
{
    protected $guarded = [];

    public function user1()
    {
        return $this->hasOne(User1::class);
    }
}
