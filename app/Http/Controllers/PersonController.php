<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Personservices;
use App\Exports\PersonsExport;
use App\Imports\PersonsImport;
use Maatwebsite\Excel\Facades\Excel;


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


    public function insert(Request $request)
    {
        $insertid = $this->personservice->addPerson($request);
        return back()->with('insertid',$insertid);
    }
    

    public function update($id,$phone)
    {
        $result = $this->phonebookservice->updatePhonebook($id,$phone);
        return back();
    }


    public function delete($id)
    {
        $result = $this->personservice->deletePerson($id);
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
