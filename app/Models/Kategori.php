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

}
