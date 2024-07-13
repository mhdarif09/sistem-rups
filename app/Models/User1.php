<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin1; // Pastikan namespace Admin1 sesuai dengan struktur direktori

class User1 extends Model
{
    protected $guarded = [];

    public function admin1()
    {
        return $this->belongsTo(Admin1::class);
    }
}
