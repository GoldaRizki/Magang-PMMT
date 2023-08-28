<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;


    public function mesin(){
        return $this->belongsTo(Mesin::class);
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

    public function sparepart() {
        return $this->belongsToMany(Sparepart::class);
    }

}