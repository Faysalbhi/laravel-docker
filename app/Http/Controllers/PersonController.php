<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Personservices;

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

}
