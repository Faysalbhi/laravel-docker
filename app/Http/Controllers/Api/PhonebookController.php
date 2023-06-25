<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Phonebook\PhonebookResource;
use App\Http\Resources\Phonebook\PhonebookCollection;
use App\Services\Phonebookservices;
use App\Http\Requests\PhonebookRequest;
use App\Models\Phonebook;
use App\Traits\HttpResponses;

class PhonebookController extends Controller
{
    use HttpResponses;

    public $phonebookservice;

    public function __construct(Phonebookservices $phonebookservice) 
    {
        $this->phonebookservice=$phonebookservice;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        
        $data=[
            "type"=>$request->type,
            "person_id"=>$request->person_id,
        ];
        $phonebooklist = $this->phonebookservice->phonebookList($data);

        return PhonebookCollection::collection($phonebooklist);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhonebookRequest $request)
    {
        

        $phonebook = $this->phonebookservice->addPhonebook($request);

        return new PhonebookResource($phonebook);
    }

    /**
     * Display the specified resource.
     */
    public function show(Phonebook $phonebook)
    {
        return new PhonebookResource($phonebook);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
