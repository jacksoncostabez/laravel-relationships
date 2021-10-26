<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    //Retorna as empresas vinculadas a uma cidade.
    public function manyToMany()
    {
        $city = City::where('name', 'Itainópolis')->get()->first();
        echo "<b>Cidade: {$city->name}</b><br>";

        $companies = $city->companies;

        foreach($companies as $company) {
            echo "{$company->name}, ";
        }
    }

    //Retorna as cidades vinculadas a uma empresa.
    public function manyToManyInverse()
    {
        $company = Company::where('name', 'Jcb Empreendimentos')->get()->first();
        echo "<b>Empresa: {$company->name}</b><br>";

        $cities = $company->cities;

        foreach($cities as $city) {
            echo "{$city->name}, ";
        }
    }

    //Vincula uma empresa a várias cidades
    public function manyToManyInsert()
    {
        $dataForm = [1, 2, 6];

        $company = Company::find(2);
        echo "<b>{$company->name}</b><br>";

        //faz o vínculo, mas não faz sincronizaçao, ou seja, insere dados duplicados.
        //$company->cities()->attach($dataForm);
        
        //$company->cities()->sync($dataForm);//faz o vínculo e sincroniza, ou seja, remove os outros vínculos não especificados no array.

        $company->cities()->detach([6]); //remove o vínculo da empresa a uma determinada cidade.


        $cities = $company->cities;
        foreach($cities as $city) {
            echo " {$city->name}, ";
        }

    }

}
