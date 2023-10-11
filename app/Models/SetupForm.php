<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SetupForm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    protected $casts =[
        'value' => 'array',
    ];

    public function setupMaintenance(){
        return $this->belongsTo(SetupMaintenance::class);
    }
    
    
}
