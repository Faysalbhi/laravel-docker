<?php

namespace App\Http\Resources\Person;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'href'=>[
                'phonebooks'=>route('phonebooks.index',['person_id' => $this->id]),
            ],
        ];
    }
}
