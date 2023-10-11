<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;


class Mesin extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['maintenance'];

    protected $dates = ['deleted_at'];
    
    
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
