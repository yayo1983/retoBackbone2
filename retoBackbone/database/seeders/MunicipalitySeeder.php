<?php

namespace Database\Seeders;

use App\Models\FederalEntity;
use App\Models\Municipality;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $xmlString = file_get_contents(public_path('CPdescarga.xml'));
            $xmlObject = @simplexml_load_string($xmlString);
            $json = json_encode($xmlObject);
            $phpArray = json_decode($json, true);
            $arrayM= [];
            foreach($phpArray['table'] as $cpData){
                if(in_array($cpData['D_mnpio'], $arrayM) == false){
                    Municipality::create(array(
                        'name' => $cpData['D_mnpio'],
                        'fe_id' => FederalEntity::where('code', $cpData['c_estado'])->first()->id
                    ));
                    array_push($arrayM, $cpData['D_mnpio']); 
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
