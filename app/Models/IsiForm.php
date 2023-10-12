<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IsiForm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id']; 
    protected $dates = ['deleted_at'];

    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }

    public function form(){
        return $this->belongsTo(Form::class);
    }
}
