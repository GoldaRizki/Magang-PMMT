<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;


class Mesin extends Model
{
    use HasFactory;
    use SoftDeletes, CascadesDeletes;

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
    
    public function form(){
        return $this->hasManyThrough(Form::class,Maintenance::class);    
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



}
