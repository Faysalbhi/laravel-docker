<?php

namespace App\services;

use App\Models\Person;

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
                return "success";

            } else {
                return "fail";
            }

        }catch(\Exception $e){
            \Log::info("Error Whene Phonebook trying to insert: ".$e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
    }

    public function updatePhonebook($id,$phone)
    {

        try{

            $result=Phonebook::where('id',$id)->update([
                'phone'=>$phone
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