<?php

namespace App\Http\Controllers;

use App\Models\ServiceCP;

class ServiceCPController extends Controller
{
    /**
     * Call the service for return the data for 
     *
     * @param Request $request
     * @since  1.0
     * @author Yasser Azán 
     *
     * @return array
     */

    public function serviceCP(int  $cp=1):array{
        if(is_int($cp) && $cp !=1){
            $serviceCP = new ServiceCP();
            return $serviceCP->cp($cp);
            }
        return ['not valid postal code'];
    }
  
}
