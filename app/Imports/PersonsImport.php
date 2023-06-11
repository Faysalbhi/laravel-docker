<?php

namespace App\Imports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\ToModel;

class PersonsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Person([
            'name'     => $row[1],
            'email'    => $row[2]
        ]);
    }
}
