<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Form extends Model
{
    use HasFactory;
    use SoftDeletes, CascadesDeletes;

    protected $cascadeDeletes = ['isi_form'];

    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];
    
    
    protected $casts =[
        'value' => 'array',
    ];
    

    public function maintenance(){
        return $this->belongsTo(Maintenance::class);
    }

    public function isi_form(){
        return $this->hasMany(IsiForm::class);
    }
}
