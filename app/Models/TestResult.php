<?php

namespace App\Models;

use App\Models\LearningStyle;
use App\Models\Test;
use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $table = 'test_results';

    /**
     * Properties that are mass fillable
     * 
     * @var array
     */
    protected $fillable = [
        'id', 
        'test_id', 
        'learning_style_id', 
        'token', 
        'ec', 
        'or', 
        'ca', 
        'ea'
    ];

    public function learningStyle() 
    {
        return $this->belongsTo(LearningStyle::class);
    }

    public function test() 
    {
        return $this->belongsTo(Test::class);
    }
}
