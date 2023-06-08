<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Personservices;
use App\Services\Phonebookservices;

class ContactController extends Controller
{
    public function index()
    {

        return view('contact.index');
    }

    public function store(Request $request,Personservices $personservice,Phonebookservices $phonebookservice)
    {

        $person_id=$personservice->addPerson($request);
       
        foreach($request->phone as $i=>$phone) {

            $phone;
            $type=$request->type[$i];
            // make a array 
            $data=['phone'=>$phone,'person_id'=>$person_id,'type'=>$type];
            // the make a object for service class 
            $object = (object) $data;
            $add_phonebook_result=$phonebookservice->addPhonebook($object);
            
        }

        return redirect()->route('contact')->with('status','add_phonebook_result');
    }
    public function show()
    {
        return view('contact.show');
    }
}
