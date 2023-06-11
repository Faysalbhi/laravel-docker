<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Phonebookservices;
use App\Services\Personservices;
use App\Exports\PhonebookExport;
use App\Imports\PhonebookImport;
use Maatwebsite\Excel\Facades\Excel;


class PhonebookController extends Controller
{
    public $phonebookservice;
    public $personservice;

    public function __construct(Phonebookservices $phonebookservice,Personservices $personservice)
    {
        $this->phonebookservice=$phonebookservice;
        $this->personservice=$personservice;
    }


    public function index()
    {
        $phonebooklist = $this->phonebookservice->phonebookList();
        $personlist = $this->personservice->personList();
        return view('phonebook.index',[
            'phonebooklist'=>$phonebooklist,
            'persons'=>$personlist
        ]);

    }


    public function insert(Request $request)
    {
        $insertid = $this->phonebookservice->addPhonebook($request);
        return back()->with('insertid',$insertid);
    }
    

    public function update($id,$phone)
    {
        $result = $this->phonebookservice->updatePhonebook($id,$phone);
        return back();
    }


    public function delete($id)
    {

        DB::beginTransaction();
        try{
            $result = $this->phonebookservice->deletePhonebook($id);
            DB::commit();
        } catch (\Exception $e){
            \Log::info($e->getMessage());
            DB::rollback();
            return false;
        }
        
    }

    public function export(Request $request)
    {
        return Excel::download(new PhonebookExport($request->type), 'phonebooklist.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new PhonebookImport, $request->file('file'));

        return redirect('phonebooklist')->with('success','Successfully Imported');
    }

}
