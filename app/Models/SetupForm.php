<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetupForm extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    protected $casts =[
        'value' => 'array',
    ];

    public function setup_maintenance(){
        return $this->belongsTo(SetupMaintenance::class);
    }
    
    
}
