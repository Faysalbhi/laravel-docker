<?php

namespace App\Imports;

use App\Models\Phonebook;
use Maatwebsite\Excel\Concerns\ToModel;

class PhonebookImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Phonebook([
            'phone'     => $row[0],
            'type'    => $row[1],
            'person_id'=>$row[2]
        ]);
    }
}
