<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    
    
    
    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }
    
    public function maintenance() {
        return $this->hasMany(Maintenance::class);
    } 

    public function ruang(){
        return $this->belongsTo(Ruang::class);
    }

}
