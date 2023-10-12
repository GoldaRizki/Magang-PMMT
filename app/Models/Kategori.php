<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;


class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes, CascadesDeletes;

    protected $cascadeDeletes = ['mesin', 'setupMaintenance'];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function mesin(){
        return $this->hasMany(Mesin::class);
    }

    public function setupMaintenance(){
        return $this->hasMany(SetupMaintenance::class);
    }

    public function setupForm(){
        return $this->hasManyThrough(SetupForm::class,
         SetupMaintenance::class,
        'kategori_id',
        'setup_maintenance_id',
        'id',
        'id'
        );
    }

}
