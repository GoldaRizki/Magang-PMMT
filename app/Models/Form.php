<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    
    protected $casts =[
        'value' => 'array',
    ];
    

    public function maintenance(){
        return $this->belongsTo(Maintenance::class);
    }
}