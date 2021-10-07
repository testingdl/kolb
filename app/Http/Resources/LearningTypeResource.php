<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LearningTypeResource extends JsonResource
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
            'id'           => $this->resource->id,  
            'description'  => $this->resource->description,  
            'abbreviation' => $this->resource->abbreviation,
            'details'      => $this->resource->details,
            'test_result'  => $this->resource->test_result,
        ];
    }
}
