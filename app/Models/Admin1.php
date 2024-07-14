<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User1; // Ensure this is the correct namespace for the User1 model

class Admin1 extends Model
{
    // Define the attributes that are mass assignable
    protected $fillable = [
        'Arahan', 'PIC', 'Hasil_tindak_lanjut', 'Status', 'Keterangan', 'Bukti', 
        'approved_by_user2', 'approved_by_user3'
    ];
    
    // Define the relationship with User1 model
    public function user1()
    {
        return $this->hasOne(User1::class);
    }
}
