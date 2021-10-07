<?php

namespace App\Http\Controllers\Kolb;

use App\Http\Controllers\Controller;
use App\Http\Resources\LearningTypeResource;
use App\Models\LearningType;
use Illuminate\Http\Request;

class LearningTypesController extends Controller
{
    public function index(Request $request) 
    {
        $learningTypes = LearningType::withTrashed()->get();
        return LearningTypeResource::collection($learningTypes);
    }
}
