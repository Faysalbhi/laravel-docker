<?php

namespace App\Http\Resources\Phonebook;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhonebookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'phone'=>$this->phone,
            'name'=>$this->person->name ?? null,
            'type'=>$this->type
        ];
            
        
    }
}
