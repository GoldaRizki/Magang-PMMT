<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiForm extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }

    public function form(){
        return $this->belongsTo(Form::class);
    }
}
