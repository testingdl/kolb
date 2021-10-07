<?php

namespace App\Http\Controllers\Kolb;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuestionsResource;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index(Request $request) 
    {
        $questions = Question::withTrashed()
            ->with('answers.learningType')
            ->get();
        
        return QuestionsResource::collection($questions);
    }
}
