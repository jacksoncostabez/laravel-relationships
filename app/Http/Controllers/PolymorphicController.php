<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        //Buscando comentários de uma cidade
        
        $city = City::where('name', 'Itainópolis')->get()->first();
        echo "<b>{$city->name}</b><br><br>";

        $comments = $city->comments()->get();

        foreach($comments as $comment) {
            echo "{$comment->description}<hr>";
        }
        
        $state = State::where('name', 'Piauí')->get()->first();
        echo "<b>{$state->name}</b><br><br>";

        $comments = $state->comments()->get();

        foreach($comments as $comment) {
            echo "{$comment->description}<hr>";
        }

        $country = Country::where('name', 'Brasil')->get()->first();
        echo "<b>{$country->name}</b><br><br>";

        $comments = $country->comments()->get();

        foreach($comments as $comment) {
            echo "{$comment->description}<hr>";
        }

    }

    public function polymorphicInsert()
    {
        /* Comentando com a cidade
        $city = City::where('name', 'Itainópolis')->get()->first();
        echo "{$city->name}<br>";

        $comment = $city->comments()->create([
            'description' => "New Comment {$city->name} ".date('YmdHis'),
        ]);
         */

         /*
        $state = State::where('name', 'Piauí')->get()->first();
        echo "{$state->name}<br>";

        $comment = $state->comments()->create([
            'description' => "New Comment {$state->name} ".date('YmdHis'),
        ]);
        */

        $country = Country::where('name', 'Brasil')->get()->first();
        echo "{$country->name}<br>";

        $comment = $country->comments()->create([
            'description' => "New Comment {$country->name} ".date('YmdHis'),
        ]);

        var_dump($comment->description);
    }
}
