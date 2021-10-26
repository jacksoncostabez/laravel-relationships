<?php

use Illuminate\Support\Facades\Route;

/**
 * One To One
 */
Route::get('one-to-one', 'App\Http\Controllers\OneToOneController@oneToOne');
Route::get('one-to-one-inverse', 'App\Http\Controllers\OneToOneController@oneToOneInverse');
Route::get('one-to-one-insert', 'App\Http\Controllers\OneToOneController@oneToOneInsert');

/**
 * One To Many
 */
Route::get('one-to-many', 'App\Http\Controllers\OneToManyController@oneToMany');
Route::get('many-to-one', 'App\Http\Controllers\OneToManyController@manyToOne');
Route::get('one-to-many-two', 'App\Http\Controllers\OneToManyController@oneToManyTwo');
Route::get('one-to-many-insert', 'App\Http\Controllers\OneToManyController@oneToManyInsert');
Route::get('one-to-many-insert-two', 'App\Http\Controllers\OneToManyController@oneToManyInsertTwo');

/**
 * Has Many Through
 */
Route::get('has-many-through', 'App\Http\Controllers\OneToManyController@hasManyThrough');

/**
 * Many to Many
 */
Route::get('many-to-many','App\Http\Controllers\ManyToManyController@manyToMany');
Route::get('many-to-many-inverse','App\Http\Controllers\ManyToManyController@manyToManyInverse');
Route::get('many-to-many-insert','App\Http\Controllers\ManyToManyController@manyToManyInsert');

/**
 * Relation Polymorphic
 */
Route::get('polymorphics','App\Http\Controllers\PolymorphicController@polymorphic');
Route::get('polymorphic-insert','App\Http\Controllers\PolymorphicController@polymorphicInsert');

Route::get('/', function () {
    return view('welcome');
});
