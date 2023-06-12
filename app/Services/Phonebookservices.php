<?php

namespace App\services;

use App\Models\Phonebook;
use DB;

class Phonebookservices {

    public function phonebookList($data=[])
    {
        try{
            $query = Phonebook::query();

            if (isset($data['type'])){
                $query->whereIn('type', $data['type']);
            }

            if (isset($data['person_id'])){
                $query->whereIn('person_id', $data['person_id']);
            }
            
            return $query->get();

        }catch(\Exception $e){
            \Log::info($e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
    }

    public function phonebookListByArray($data)
    {
        try{
            $query = Phonebook::query();

            if (isset($data['type'])){
                $query->whereIn('type', $data['type']);
            }

            if (isset($data['person_id'])){
                $query->whereIn('person_id', $data['person_id']);
            }

            return $query->get();
        }catch(\Exception $e){
            \Log::info($e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
        }
    }

    public function addPhonebook($data)
    {
        try{
            
            $result = Phonebook::insertGetId([
                'phone'=>$data->phone,
                'person_id'=>$data->person_id,
                'type'=>$data->type
            ]);

            if ($result) {
                return "success";

            } else {
                return "fail";
            }

        }catch(\Exception $e){
            DB::rollback();
            \Log::info("Error Whene Phonebook trying to insert: ".$e->getMessage());
            echo "<h3 style='text-align:center;color:red'>Something went wrong.Please Contact with Developer</h3>";
            return "faild";
        }
    }

    public function getPhonebook($id)
    {
        $result=Phonebook::where('person_id',$id)->get();
        return $result;
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


    public function deletePhonebook($id)
    {
        
        try{
            
            $result=Phonebook::where('id',$id)->delete();

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

    public function deleteWithPersonId($id)
    {

        try{

            Phonebook::where('person_id',$id)->delete();
            return true;
        } catch (\Exception $e){
            \Log::info("Error Whene Phonebook trying to Delete with personID: ".$e->getMessage());
            DB::rollback();
            return false;
        }
        
    }
  

}