<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sparepart extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];


    
    public function maintenance() {
        return $this->belongsToMany(Maintenance::class);
    }
    
    public function jadwal() {
        return $this->belongsToMany(Jadwal::class);
    }
}
