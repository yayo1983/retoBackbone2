<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class PostalCode  extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'postal_codes';

    protected $fillable = [
        'name',  'id', 'locality'
    ];

    public function __construct()
    {
        
    }
    
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
}
