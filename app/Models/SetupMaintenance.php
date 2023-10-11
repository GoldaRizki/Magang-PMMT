<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class SetupMaintenance extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['setupForm'];

    protected $dates = ['deleted_at'];


    protected $guarded = ['id'];
    

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
    
    public function setupForm(){
        return $this->hasMany(SetupForm::class, 'setup_maintenance_id');
    }
   
    
}
