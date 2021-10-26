<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne ()
    {
        //$country = Country::find(1);
        $country = Country::where('name', 'Brasil')->get()->first();

        echo $country->name;

        $location = $country->location;
        echo "<hr>Latitude: {$location->latitude}<br>";
        echo "Longitude: {$location->longitude}<br>";
    }

    //buscando o Pais pelas coordenadas
    public function oneToOneInverse ()
    {
        $latitude = 456;
        $longitude = 654;

        $location = Location::where('latitude', $latitude)->where('longitude', $longitude)->get()->first();

        $pais = $location->country;
        echo $pais->name;

    }

    public function oneToOneInsert ()
    {
        $dataForm = [
            'name' => 'Belgica',
            'latitude' => '887',
            'longitude' => '788',
        ];

       // $country = Country::create($dataForm); // cadastra o pais
        $country = Country::where('name', 'Belgica')->get()->first();// busca o pais pelo nome e cadastra uma nova localização na linha abaixo

        $location = $country->location()->create($dataForm); //cadastra a localizacao
        //location() é o método que cria o relacionamento entre Country e Location

        /* Dá erro!
        $dataForm['country_id'] = $country->id; // recebe o id do pais
        $location = Location::create($dataForm); //cadastra a longitude e latitude do pais.
        */

        //OU...
        /*
        $location = new Location;
        $location->latitude = $dataForm['latitude'];
        $location->longitude = $dataForm['longitude'];
        $location->country_id = $country->id;
        $saveLocation = $location->save();
        */

    }

}
