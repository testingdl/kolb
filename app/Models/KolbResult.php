<?php

namespace App\Models;

use App\Models\learningStyle;
use Illuminate\Database\Eloquent\Model;

class KolbResult extends Model
{
    protected $table = 'kolb_results';

    /**
     * Properties that are mass fillable
     * 
     * @var array
     */
    protected $fillable = [
        'id', 'token', 'learning_style_id', 'ec', 'or', 'ca', 'ea'
    ];

    public function learningStyle() 
    {
        return $this->belongsTo(learningStyle::class);
    }
}
