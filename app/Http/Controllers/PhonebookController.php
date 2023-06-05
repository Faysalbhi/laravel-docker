<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Phonebookservices;

class PhonebookController extends Controller
{
    public $phonebookservice;

    public function __construct(Phonebookservices $phonebookservice)
    {
        $this->phonebookservice=$phonebookservice;
    }


    public function index()
    {
        $phonebooklist = $this->phonebookservice->phonebookList();
        return view('phonebook.index',[
            'phonebooklist'=>$phonebooklist
        ]);

    }


    public function insert(Request $request)
    {
        $insertid = $this->phonebookservice->addPhonebook($request->phone);
        return back()->with('insertid',$insertid);
    }
    

    public function update($id,$phone)
    {
        $result = $this->phonebookservice->updatePhonebook($id,$phone);
        return back();
    }


    public function delete($id)
    {
        $result = $this->phonebookservice->deletePhonebook($id);
        return back();
    }

}
