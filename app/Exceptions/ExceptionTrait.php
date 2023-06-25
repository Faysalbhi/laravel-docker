<?php

namespace App\Exceptions;

trait ExceptionTrait {

    public function apiException($request, $e)
    {
        
            

            if($e instanceof ModelNotFoundException) {
                return response()->json([
                    'errors'=>'Model Not Found',
                ],404);
            }
            
            if($e instanceof NotFoundHttpException) {
                return response()->json([
                    'errors'=>'Incorect Route',
                ],404);
            }

            return parent::render($request, $e);
        }
    

}