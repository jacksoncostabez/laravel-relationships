<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'initials', 'country_id'];

    //retorna o pais relacionamento ao estado
    public function country() 
    {
        return $this->belongsTo(Country::class);
    }

    //retorna as cidades relacionadas ao estado
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
