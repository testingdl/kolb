<?php

namespace App\Libraries;

use Illuminate\Support\Collection;
use App\Models\LearningStyle;
use App\Traits\KolbTestStyles;
use App\Models\LearningType;

class Kolb implements KolbTestStyles
{
    /**
     * Kolb app id when running the seeders at first
     *
     * @var Int
     */
    const ID = 1;

    /**
     * Storage the total score for concrete experience learning type
     * 
     * @access protected
     * @var    Int
     */
    protected $totalConcreteExperience = 0;

    /**
     * Storage the total score for reflective observation learning type
     * 
     * @access protected
     * @var    Int
     */
    protected $totalReflectiveObservation = 0;

    /**
     * Storage the total score for abstract conceptualization learning type
     * 
     * @access protected
     * @var    Int
     */
    protected $totalAbstractConceptualization = 0;

    /**
     * Storage the total score for active experimentation learning type
     * 
     * @access protected
     * @var    Int
     */
    protected $totalActiveExperimentation = 0;

    /**
     * Storage the learning types results
     * 
     * @access protected
     * @var    \Illuminate\Database\Eloquent\Collection
     */
    protected $learningTypes;

    /**
     * Retrieve all the answers from questions into an array
     * 
     * @param  Array $questions
     * @return Array $answers
     */
    private function collectAnwers(Array $questions) 
    {
        $answers = array();

        foreach($questions as $question) {
            $answers[] = $question->answers;
        }

        return $answers;
    }

    private function makeCalc(Array $answers) 
    {
        foreach($answers as $key => $answer) {
            $index = $key + 1;

            switch ($answer->learning_type->abbreviation) {
                case 'EC':
                    $this->totalConcreteExperience += $index;
                    break;
                case 'OR':
                    $this->totalReflectiveObservation += $index;
                    break;
                case 'CA':
                    $this->totalAbstractConceptualization += $index;
                    break;
                case 'EA':
                    $this->totalActiveExperimentation += $index;
                    break;
            }
        }
        return true;
    }

    /**
     * Get test results
     * 
     * @param  Array $questions
     * @return \Illuminate\Database\Eloquent\Collection 
     *         \App\Models\LearningType
     */
    public function getResults(Array $questions) 
    {
        $collection = $this->collectAnwers($questions);

        foreach($collection as $answers) {
            $this->makeCalc($answers);
        }

        $this->learningTypes = LearningType::all()->map(function($item) {
            switch ($item->abbreviation) {
                case 'EC':
                    $item->result = $this->totalConcreteExperience;
                    break;
                case 'OR':
                    $item->result = $this->totalReflectiveObservation;
                    break;
                case 'CA':
                    $item->result = $this->totalAbstractConceptualization;
                    break;
                case 'EA':
                    $item->result = $this->totalActiveExperimentation;
                    break;
            }

            return $item;
        });

        return $this->learningTypes;
    }

    public function setResults(Array $results) 
    {
        return LearningType::all()->map(function($item) use ($results) {
            switch ($item->abbreviation) {
                case 'EC':
                    $item->result = $results['ec'];
                    break;
                case 'OR':
                    $item->result = $results['or'];
                    break;
                case 'CA':
                    $item->result = $results['ca'];
                    break;
                case 'EA':
                    $item->result = $results['ea'];
                    break;
            }

            return $item;
        });
    }

    public function getLearningStyle() 
    {
        if(!isset($this->learningTypes)) {
            return false;
        }

        $results = [
            'CA_EC' => $this->totalAbstractConceptualization - $this->totalConcreteExperience,
            'EA_OR' => $this->totalActiveExperimentation     - $this->totalReflectiveObservation
        ];

        if($results['EA_OR'] >= 6 && $results['CA_EC'] <= 3) {
            $style = LearningStyle::findOrFail(self::USHER);
        }
        else if($results['EA_OR'] <= 5 && $results['CA_EC'] <= 3) {
            $style = LearningStyle::findOrFail(self::DIVERGENT);
        }
        else if($results['EA_OR'] >= 6 && $results['CA_EC'] >= 4) {
            $style = LearningStyle::findOrFail(self::CONVERGENT);
        }
        else if($results['EA_OR'] <= 5 && $results['CA_EC'] >= 4) {
            $style = LearningStyle::findOrFail(self::ASSIMILATOR);
        }
        else {
            return null;
        }

        return $style;
    }
}
