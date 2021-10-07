<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    /**
     * Max quantity of questions allowerd per test
     */
    const MAX_QUANTITY_OF_QUESTIONS = 12;

    /**
     * Min quantity of questions allowerd per test
     */
    const MIN_QUANTITY_OF_QUESTIONS = 12;
    
    /**
     * Entity table name
     * 
     * @access protected
     * @var    String
     */
    protected $table = 'questions';

    /**
     * Properties that are mass fillable
     * 
     * @access protected
     * @var    Array
     */
    protected $fillable = [
        'id', 'description'
    ];

    use SoftDeletes;

    /**
     * Questions entity belongs to one Test entity
     * 
     * @access public
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test() 
    {
        return $this->belongsTo(Test::class);
    }

    /**
     * Questions entity one to many relationship with asnwers
     * 
     * @access public
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers() 
    {
        return $this->hasMany(Answer::class);
    }
}
