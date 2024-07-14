<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin1; // Ensure this is the correct namespace for the Admin1 model

class User1 extends Model
{
    // Define the attributes that are mass assignable
    protected $guarded = []; // You may also use $fillable if you prefer

    // Define the relationship with Admin1 model
    public function admin1()
    {
        return $this->belongsTo(Admin1::class);
    }
}
