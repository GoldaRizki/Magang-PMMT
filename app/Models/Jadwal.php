<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;


class Jadwal extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['isi_form'];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    public function maintenance() {
        return $this->belongsTo(Maintenance::class);
    }

    public function isi_form(){
        return $this->hasMany(IsiForm::class);
    }

    
    
}
