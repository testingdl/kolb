<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Question;
use App\Models\Answer;

class SubmitQuestionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'questions' => [
                'required',
                'array',
                'min:'.Question::MIN_QUANTITY_OF_QUESTIONS,
                'max:'.Question::MAX_QUANTITY_OF_QUESTIONS,
            ],
            'questions.*.answers' => [
                'required',
                'array',
                'min:'.Answer::MIN_ANSWERS_PER_QUESTION,
                'max:'.Answer::MAX_ANSWERS_PER_QUESTION
            ]
        ];
    }

    public function messages()
    {
        return [
            'questions.required' => __("Debe contestar todas las preguntas"),
            'questions.array'    => __("Debe contestar todas las preguntas"),
            'questions.min'      => __("Debe contestar todas las preguntas"),
            'questions.max'      => __("La cantidad de preguntas no cumplen el máximo establecido"),
            'questions.*.answers.min' => __("Debe seleccionar todas las respuestas"),
            'questions.*.answers.max' => __("La cantidad de respuestas suministradas es incorrecta"),
        ];
    }
}
