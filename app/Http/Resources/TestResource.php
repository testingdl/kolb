<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->resource->id,
            'name'        => $this->resource->name,
            'description' => $this->resource->description,
            'results'     => $this->resource->results,
            'style'       => $this->resource->style,
            'endpoint'    => $this->resource->endpoint,
            'questions'   => $this->whenLoaded('questions', function() {
                return QuestionsResource::collection($this->resource->questions);
            }),
            'learningTypes' => $this->whenLoaded('learningTypes', function() {
                return LearningTypeResource::collection($this->resource->learningTypes);
            }),
            'learningStyles' => $this->whenLoaded('learningStyles', function() {
                return LearningStyleResource::collection($this->resource->learningStyles);
            })
        ];
    }
}
