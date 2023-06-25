<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Personservices;
use App\Exports\PersonsExport;
use App\Imports\PersonsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Person;


class PersonController extends Controller
{
    public $personservice;

    public function __construct(PersonServices $personservice)
    {
        $this->personservice=$personservice;
    }


    public function index()
    {
        $personlist = $this->personservice->personList();
        return view('person.index',[
            'persons'=>$personlist
        ]);

    }


    public function store(Request $request)
    {
        $person = $this->personservice->addPerson($request);
        return back()->with('person',$person);
    }
    

    public function update(PersonRequest $request,Person $person)
    {
        $result = $this->phonebookservice->updatePhonebook($request,$phone);
        return back();
    }


    public function destroy(Person $person)
    {
        $result = $this->personservice->deletePerson($person);
        return back();
    }

    public function export(Request $request)
    {
        return Excel::download(new PersonsExport, 'persons.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new PersonsImport, $request->file('file'));

        return redirect('personlist')->with('success','Successfully Imported');
    }

}
