<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningType extends Model
{
    /**
     * Entitiy table name
     * 
     * @access protected
     * @var    String
     */
    protected $table = 'learning_types';

    /**
     * Properties that are masss fillable
     * 
     * @access protected
     * @var    Array 
     */
    protected $fillable = [
        'id', 'description', 'abbreviation'
    ];

    /**
     * Properties that ar hidden
     * 
     * @access protected
     * @var    Array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    use SoftDeletes;

    /**
     * LearninType entity one to many relationship with Answer
     * 
     * @access public
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers() 
    {
        return $this->hasMany(Answer::class);
    }

    public function setResultAttribute($value) 
    {
        $this->attributes['result'] = $value;
    }
}
