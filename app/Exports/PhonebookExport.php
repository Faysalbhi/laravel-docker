<?php

namespace App\Exports;

use App\Models\Phonebook;
use Maatwebsite\Excel\Concerns\FromCollection;

class PhonebookExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $type;

    public function __construct($type)
    {
        $this->type=$type;
    }


    public function collection()
    {
        if($this->type!==null) {

            return Phonebook::where('type',$this->type)->get(['phone','type','person_id']);
        }else {
            return Phonebook::get(['phone','type','person_id']);
        }
    }
}
