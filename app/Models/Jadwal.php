<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function maintenance() {
        return $this->belongsTo(Maintenance::class);
    }

    public function isi_form(){
        return $this->hasMany(IsiForm::class);
    }

    
    
}
