<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;


class Ruang extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['mesin'];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function mesin(){
        return $this->hasMany(Mesin::class);
    }
}
