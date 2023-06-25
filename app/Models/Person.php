<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phonebook;

class Person extends Model
{
    use HasFactory;
    protected $table="people";
    protected $guarded=['id'];

    public function phonebooks()
    {
        return $this->hasMany(Phonebook::class);
    }
}
