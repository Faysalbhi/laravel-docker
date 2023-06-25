<?php

namespace App\services;

use App\Models\Person;
use DB;

class Personservices {

    public function personList()
    {
        try{

            $result = Person::all();
            if ($result) {
                return $result;

            } else {
                return null;
            }

        }catch(\Exception $e){
            \Log::info($e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
    }

    

    public function addPerson($data)
    {
        try{
            
            
            $person = new Person;
            $person->name = $data->name;
            $person->email = $data->email;
            $person->save();

            return $person;


        }catch(\Exception $e){
            \Log::info("Error Whene Phonebook trying to insert: ".$e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
            return "Faild";
        }
    }

    public function showPerson($id)
    {

        $person=Person::find($id);
        return $person;
    }

    public function updatePerson($data,$person)
    {

        try{
            $person->name = $data->name;
            $person->email = $data->email;
            $person->save();
            return $person;
            

        }catch(\Exception $e){
            \Log::info("Error Whene Phonebook trying to update: ".$e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
    }



    public function deletePerson($person)
    {
        
        try{
            
            $person = $person->delete();
            return $person;
            
        }catch(\Exception $e){
            \Log::info("Error Whene Phonebook trying to Delete: ".$e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
        

    }

}