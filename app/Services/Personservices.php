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
                return "Can't face data";
            }

        }catch(\Exception $e){
            \Log::info($e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
    }

    public function addPerson($data)
    {
        try{
            
            $result = Person::insertGetId([
                'name'=>$data->name,
                'email'=>$data->email,
            ]);

            if ($result) {
                return $result;

            } else {
                return "fail";
            }

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

    public function updatePerson($id,$data)
    {

        try{

            $result=Person::where('id',$id)->update([
                'name'=>$data->name,
                'email'=>$data->email,
            ]);

            if ($result) {
                return "success";

            } else {
                return "fail";
            }

        }catch(\Exception $e){
            \Log::info("Error Whene Phonebook trying to update: ".$e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
    }



    public function deletePerson($id)
    {
        
        try{
            
            $result=Person::where('id',$id)->delete();

            if ($result) {
                return "success";

            } else {
                abort(404,'page not found');
                return "fail";
            }
            
        }catch(\Exception $e){
            \Log::info("Error Whene Phonebook trying to Delete: ".$e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
        

    }

}