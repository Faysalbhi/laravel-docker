<?php

namespace App\Http\Resources\Phonebook;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PhonebookCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->person->name ?? null,
            'email' => $this->person->email ?? null,
            'number' => $this->phone,
            'type' => $this->type
        ];
    }
}
