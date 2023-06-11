<?php

namespace App\Exports;

use App\Models\Phonebook;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsExport implements FromCollection
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

            return Phonebook::query()
                    ->select(
                        'phonebooks.id',
                        'people.name',
                        'people.email',
                        'phonebooks.phone',
                        'phonebooks.type',
                    )
                    ->where('type',$this->type)
                    ->join('people', 'people.id', 'phonebooks.person_id')
                    ->get();
        }else {
            return Phonebook::query()
                    ->select(
                        'phonebooks.id',
                        'people.name',
                        'people.email',
                        'phonebooks.phone',
                        'phonebooks.type',
                    )
                    ->join('people', 'people.id', 'phonebooks.person_id')
                    ->get();
        }

        
    }
}
