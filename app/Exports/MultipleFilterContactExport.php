<?php

namespace App\Exports;

use App\Models\Phonebook;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MultipleFilterContactExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $data;
    protected $personlist;

    public function __construct($data,$personlist)
    {
        $this->data=$data;
        $this->personlist=$personlist;
    }


    public function view(): View
    {
        return view('filtercontact.multifilter-excel',[
            'data'=>$this->data,
            'personlist'=>$this->personlist,
        ]);
    }
}
