<?php

namespace App\Http\Resources\Person;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'SubmitionDate'=>$this->created_at->format('d-M-Y'),
            'href'=>[
                'phonebooks'=>route('phonebooks.index', ['person_id'=>$this->id])
            ],
        ];
    }
}
