<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{

    //Mais eficiente, porque na busca do Pais ele já retorna todas as relaçãoes. 
    //Não precisa fazer outra execução para trazer os estados relacionaods.
    //Tudo isso por causa do método with('states')
    public function oneToMany()
    {
        //retorna apenas o primeiro valor
        $country = Country::where('name', 'Brasil')->get()->first();

        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();

        foreach ($countries as $country) {
            echo "<b>$country->name</b>";

            $states = $country->states;

            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }
            echo '<hr>';
        }
    }

    //Executa uma consulta dos estados na base de dados a cada consulta do País. Ou seja, requer muito execução
    /*
    public function oneToMany()
    {
        //retorna apenas o primeiro valor
        $country = Country::where('name', 'Brasil')->get()->first();

        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->get();

        foreach ($countries as $country) {
            echo "<b>$country->name</b>";

            $states = $country->states()->get();

            foreach ($states as $state) {
                echo "<br>{$state->initials} - {$state->name}";
            }
            echo '<hr>';
        }

        //$states = $country->states; //ou
        //$states = $country->states()->where('initials', 'GO')->get();
        /*
        $states = $country->states()->get();

        foreach ($states as $state) {
            echo "<hr>{$state->initials} - {$state->name}";
        }
        */
    //}


    /*
    public function manyToOne ()
    {
        $stateName = 'Piauí';
        $state = State::where('name', $stateName)->get()->first();
        echo "<b>{$state->name}</b>";

        $country = $state->country;
        echo "<br>Pais: {$country->name}";
    } */

    public function manyToOne()
    {
        $stateSearch = 'Piaui';
        $states = State::where('name', 'LIKE', "%{$stateSearch}%")->get();

        foreach ($states as $state) {

            $countries = $state->country()->get();

            foreach ($countries as $country) {
                echo "{$state->name} - {$state->initials} - {$country->name}";
            }

            echo '<hr>';
        }
    }

    public function oneToManyTwo()
    {
        //retorna apenas o primeiro valor
        $country = Country::where('name', 'Brasil')->get()->first();

        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();

        foreach ($countries as $country) {
            echo "<b>$country->name</b>";

            $states = $country->states;

            foreach ($states as $state) {
                echo "<br><b>{$state->initials} - {$state->name}: </b>";

                foreach($state->cities as $city) {
                    echo "{$city->name}, ";
                }
            }
            echo '<hr>';
        }
    }

    //Usada para vincular o estado a um pais.
    public function oneToManyInsert ()
    {
        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'Ba',
        ];

        //pega o país Brasil.
        $country = Country::find(1);

        $insertState = $country->states()->create($dataForm);
        var_dump($insertState->name);
    }

    //vincula um estado a um país usando a classe State
    public function oneToManyInsertTwo ()
    {
        $dataForm = [
            'name' => 'Rio Grande do Sul',
            'initials' => 'RS',
            'country_id' => '1',
        ];

        $insertState = State::create($dataForm);
        var_dump($insertState->name);
    }

    //retorna as cidades de um determinado País.
    public function hasManyThrough ()
    {
        $country = Country::find(1);
        echo "<b>{$country->name}:</b><br>";

        $cities = $country->cities;

        foreach($cities as $city) {
            echo " {$city->name}, ";
        }
        echo "<br>Total cidades: {$cities->count()}";
    }

}
