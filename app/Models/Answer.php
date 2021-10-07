<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    /**
     * Max answers allowed per question
     */
    const MAX_ANSWERS_PER_QUESTION = 4;

    /**
     * Min answers allowed per question
     */
    const MIN_ANSWERS_PER_QUESTION = 4;

    /**
     * Entity table name
     * 
     * @access protected
     * @var    String
     */
    protected $table = 'answers';

    /**
     * Properties that are mass fillabel
     * 
     * @access protected
     * @var    Array
     */
    protected $fillable = [
        'id', 'question_id', 'description'
    ];

    use SoftDeletes;

    /**
     * Anwers entity one to one relationship with Questions
     * 
     * @access public
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question() 
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Anwers entity one to one relationship with LearningType
     * 
     * @access public
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningType() 
    {
        return $this->belongsTo(LearningType::class, 'learning_type_id');
    }
}
