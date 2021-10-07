<?php 

namespace App\Repositories\Kolb;

use App\Models\TestResult;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class ResultsRepository
{
    protected $model;

    public function __construct(TestResult $model) 
    {
        $this->model = $model;
    }

    public function find(String $token) 
    {
        return $this->model
            ->where('token', $token)
            ->first();
    }

    /**
    * Store the test results in database
    *
    * @access public
    * @param  \App\Models\Test
    * @return String $token
    */
    public function store(Test $test) 
    {
        try {
            $rows = array();

            $test->results->each(function($item) use (&$rows){
                $rows[strtolower($item->abbreviation)] = $item->result;
            });

            $token = str_random(16);

            $rows = array_merge($rows, array(
                'learning_style_id' => $test->style->id,
                'test_id' => $test->id,
                'token' => $token,
            ));

            $this->model->fill($rows);

            $this->model->save();

            return $token;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}   