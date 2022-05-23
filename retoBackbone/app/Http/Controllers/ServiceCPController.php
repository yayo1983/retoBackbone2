<?php

namespace App\Http\Controllers;

use App\Services\CPService;

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

    public function serviceCP(string  $cp=""):array{
        if(is_string($cp) && $cp !=""){
            $serviceCP = new CPService();
            return $serviceCP->cp2($cp);
            }
        return ['not valid postal code'];
    }
}
