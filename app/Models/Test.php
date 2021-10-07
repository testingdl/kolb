<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    /**
     * Test entity related table name
     * 
     * @access protected
     * @var     string
     */
    protected $protected = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description'
    ];

    use SoftDeletes;

    /**
     * Relationships
     * 
     */
    
    public function questions() 
    {
        return $this->hasMany(Question::class);
    }

    public function learningTypes() 
    {
        return $this->hasMany(LearningType::class);
    }

    public function learningStyles() 
    {
        return $this->hasMany(LearningStyle::class);
    }

    /**
     * Mutators
     * 
     */

    public function setResultsAttribute($value) 
    {
        $this->attributes['results'] = $value;
    }

    public function setStyleAttribute($value) 
    {
        $this->attributes['style'] = $value;
    }

    public function setEndpointAttribute($value) 
    {
        $this->attributes['endpoint'] = $value;
    }
}
