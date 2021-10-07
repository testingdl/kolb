<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\AnswersResource;

class QuestionsResource extends JsonResource
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
            'description' => $this->resource->description,
            'answers'     => $this->whenLoaded('answers', function() {
                return AnswersResource::collection($this->resource->answers);
            }),
        ];
    }
}
