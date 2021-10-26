<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function location()
    {
        return $this->hasOne(Location::class); //retorna a locatilação do relacionamento com a tabela Location
        //return $this->hasOne(Location::class, 'country_id'); //retorna a localização do relacionamento passando a coluna do relacionamento
    }

    //Retorna todos os estados relacionados a um determinado País.
    public function states()
    {
        return $this->hasMany(State::class);
        //A variável forein_key está dentro dos padrões, por isso não precisa especificar como está abaixo.
        //return $this->hasMany(State::class, 'country_id');

        //Caso você não tenha especificado que a relação de country_id é com id da tabela Country, então vc teria que fazer assim:
        //return $this->hasMany(State::class, 'country_id', 'id');
    }

    /**
     * retorna as cidades relacionadas a um país.
     * Para isso eu preciso passar a  classe City e State, que são as 2 classes relacionadas.
     * */
    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
