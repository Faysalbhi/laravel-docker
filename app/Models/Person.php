<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phonebook;

class Person extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function phonebook()
    {
        return $this->hasMany(Phonebook::class,'person_id');
    }
}
