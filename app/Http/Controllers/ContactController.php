<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Personservices;
use App\Services\Phonebookservices;
use DB;

class ContactController extends Controller
{   
    public $personservice;
    public $phonebookservice;

    public function __construct(Personservices $personservice,Phonebookservices $phonebookservice)
    {
        $this->personservice=$personservice;
        $this->phonebookservice=$phonebookservice;
    }

    public function index()
    {

        return view('contact.index');
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        try {

            $person_id=$this->personservice->addPerson($request);
       
            foreach($request->phone as $i=>$phone) {
                $phone;
                $type=$request->type[$i];
                // make a array with this variable  
                $data=['phone'=>$phone,'person_id'=>$person_id,'type'=>$type];
                // then make a object for service class 
                $object = (object) $data;
                $add_phonebook_result=$this->phonebookservice->addPhonebook($object);
            }
            DB::commit();

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            DB::rollback();
        }

        return redirect()->route('add.contact')->with('status',$add_phonebook_result??'faild');
    }


    public function show()
    {   
        $personlist = $this->personservice->personList();
        $phonebooklist = $this->phonebookservice->phonebookList();

        return view('contact.show',[
            'personlist'=>$personlist,
            'phonebooklist'=>$phonebooklist,
        ]);
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try{
            
            $personDelete = $this->personservice->deletePerson($id);
            $phonebokDelete = $this->phonebookservice->deleteWithPersonId($id);
            DB::commit();
            
        }catch(\Exception $e){
            \Log::info($e->getMessage());
            DB::rollback();
        }

        return back()->with('success','Deleted Successfully');
    }

    public function edit($id)
    {   
        $person = $this->personservice->showPerson($id);
        $phonebooks = $this->phonebookservice->getPhonebook($id);
        return view ('contact.edit',[
            'person'=>$person,
            'phonebooks'=>$phonebooks,
            'id'=>$id
        ]);
    }

    public function update($id,Request $request)
    {
        DB::beginTransaction();

        try {

            $person_id=$this->personservice->updatePerson($id,$request);
            $phonebokDelete = $this->phonebookservice->deleteWithPersonId($id);
       
            foreach($request->phone as $i=>$phone) {
                $phone;
                $type=$request->type[$i];
                // make a array with this variable  
                $data=['phone'=>$phone,'person_id'=>$id,'type'=>$type];
                // then make a object for service class 
                $object = (object) $data;
                $add_phonebook_result=$this->phonebookservice->addPhonebook($object);
            }
            DB::commit();

        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            DB::rollback();
        }

        return redirect()->route('showcontact')->with('success','Successfully Updated');
    }
}
