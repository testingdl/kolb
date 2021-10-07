<?php

namespace App\Http\Controllers\Kolb;

use Illuminate\Http\Request;
use App\Repositories\Kolb\ResultsRepository as Repository;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitQuestionsRequest;
use App\Http\Resources\TestResource;
use App\Libraries\Kolb;
use App\Models\Test;
use Symfony\Component\HttpFoundation\Response;

/**
 * Processes the question and it answers for a given type of test
 * provided by the users
 * 
 * @author  Jesús Sánchez
 * @package Controller
 * @version 1.0
 * @since   1.0
 */
class ResultsController extends Controller
{
    /**
     * Holds a Kolb test object instance
     * 
     * @access protected
     * @var \App\Libraries\Kolb
     */
    protected $kolb;

    /**
     * Holds an instance of results repository
     * @access protected
     * @var \App\Repositories\Kolb\ResultsRepository
     */
    protected $repository;

    /**
     * Creates a new insatance of ResultsController
     * 
     * @access public
     * @return void
     */
    public function __construct(
        Kolb $kolb,
        Repository $repository
    )
    {
        $this->kolb       = $kolb;
        $this->repository = $repository;
    }

    public function index(Request $request) 
    {
        $testResults = $this->repository
            ->find($request->token);

        if(is_null($testResults)) {
            return abort(Response::HTTP_NOT_FOUND);
        }

        $testResults->load(array('learningStyle', 'test'));

        $test = $testResults->test;

        $test->results = $this->kolb->setResults(
            $testResults->only(['ec', 'or', 'ca', 'ea'])
        )
            ->values();

        $test->style = $testResults->LearningStyle;

        return view('home')->withResults($test);
    }

    public function results(SubmitQuestionsRequest $request) 
    {
        try {
            $test = Test::findOrFail(Kolb::ID);

            $params = $request->all();

            $questions = json_encode($params['questions']);

            $questions = json_decode($questions);

            $test->results = $this->kolb
                ->getResults($questions)
                ->values();

            $test->style = $this->kolb->getLearningStyle();

            // We store the test results in the database
            $token = $this->repository->store($test);
            $test->endpoint = env('APP_URL') . 'kolb/myresults?token=' . $token;

            return new TestResource($test);
        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'errors' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        }
    }
}
