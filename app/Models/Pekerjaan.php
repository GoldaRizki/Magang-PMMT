<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function mesin(){
        return $this->belongsTo(Mesin::class);
    }

    public function jadwal() {
        return $this->hasMany(Jadwal::class);
    }

    public function barang() {
        return $this->belongsToMany(Barang::class);
    }
}
