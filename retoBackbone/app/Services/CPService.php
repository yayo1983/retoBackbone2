<?php

namespace App\Services;

use Exception;
use stdClass;
use App\Models\PostalCode;

class CPService {

    public function __construct()
    {
        
    }

    /**
     * Function for return the data without model class and database
     *
     * @param Request $request
     * @since  1.0
     * @author Yasser Azán 
     *
     * @return array
     */
    public function cp (int $cp): array{
        try {
            $xmlString = file_get_contents(public_path('CPdescarga.xml'));
            $xmlObject = @simplexml_load_string($xmlString);
            $json = json_encode($xmlObject);
            $phpArray = json_decode($json, true);
            foreach($phpArray['table'] as $cpData){
                if($cp == $cpData['d_codigo']){
                    $objectFE = new stdClass;
                    $objectFE-> key = 9;
                    $objectFE-> name = $cpData['d_estado'];
                    $objectFE-> code = $cpData['c_estado'];
                   
                    $objectST = new stdClass;
                    $objectST-> name = $cpData['d_tipo_asenta'];
                    $objectS = new stdClass;
                    $objectS->key = 90;
                    $objectS->name = $cpData['d_asenta'];
                    $objectS->zone_type = $cpData['d_zona'];
                    $objectS->settlement_type =  $objectST;

                    $objectM = new stdClass;
                    $objectM->key = 90;
                    $objectM->name = $cpData['D_mnpio'];
                   
                    $objectCP = new stdClass;
                    $objectCP-> zip_code  = $cpData['d_codigo'];
                    $objectCP-> locality = $cpData['d_ciudad'];
                    $objectCP-> federal_entity = $objectFE;
                    $objectCP-> settlements = [$objectS] ;
                    $objectCP-> municipality = $objectM;

                    return get_object_vars($objectCP);
                }
            } 
            return ['Not found postal code'];
        } catch (Exception $e) {
            throw $e;
        }
        return [];
    }

     /**
     * Function for return the data with model class and database
     *
     * @param string $cp is the zip_code
     * @since  1.0
     * @author Yasser Azán 
     *
     * @return array
     */
    public function cp2 (string $cp): array{
        try {
            $postalCode = PostalCode::where('zip_code', $cp)->first();
            return  $postalCode->postalcode;
        } catch (Exception $e) {
            throw $e;
        }
        return ['Not found postal code'];
    }
}