<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mesin(){
        return $this->hasMany(Mesin::class);
    }

    public function setupMaintenance(){
        return $this->hasMany(SetupMaintenance::class);
    }

    public function setup_form(){
        return $this->hasManyThrough(SetupMaintenance::class,
         SetupForm::class,
        'kategori_id',
        'setup_maintenance_id',
        'id',
        'id'
        );
    }

}
