<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function companies()
    {
        return $this->BelongsToMany(Company::class, 'company_city');
    }

    //commentable é o método da classe Comment.
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
