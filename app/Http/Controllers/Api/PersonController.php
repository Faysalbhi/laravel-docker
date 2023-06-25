<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Person\PersonResource;
use App\Http\Resources\Person\PersonCollection;
use App\Models\Person;
use App\Services\Personservices;
use App\Http\Requests\PersonRequest;
use App\Traits\HttpResponses;

class PersonController extends Controller
{
    use HttpResponses;
    public $personservice;

    public function __construct(PersonServices $personservice)
    {
        $this->personservice=$personservice;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PersonCollection::collection(Person::all());
    }

   

    public function store(PersonRequest $request)
    {
        $person = $this->personservice->addPerson($request);

        return response([
            'data'=>new PersonResource($person),
        ],200);
        
    }

    
    public function show(Person $person)
    {
        return new PersonResource($person);
    }

  
    public function update(PersonRequest $request, Person $person)
    {

        // return $this->isNotAuthorized('admin'); 

        $person = $this->personservice->updatePerson($request,$person);
        return new PersonResource($person);

    }

   
    public function destroy(Person $person)
    {   
        // return $this->isNotAuthorized('admin'); 

        $person = $this->personservice->deletePerson($person);
        return $this->success(null,'Person Deleted');
    }


    private function isNotAuthorized($check)
    {
        if(\Auth::user()->role !== $check){
            return $this->error(null,'You are Not Authorized For this Action');
            // throw new PersonNotBelongsToUser;
        }
    }
}
