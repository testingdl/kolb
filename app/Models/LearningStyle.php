<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningStyle extends Model
{
    protected $table = 'learning_styles';

    protected $fillable = [
        'id', 'name', 'description', 'details'
    ];

    public function test() 
    {
        return $this->belongsTo(Test::class);
    }
}
