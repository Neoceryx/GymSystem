<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

{ /* Region Test Routes */

  Route::get("Test",function ($value='') {
    return "Hello World";
  });

  Route::get("Home",function ($value='') {

    // Loads the Home view
    return view("Home");

  });

  // route whit parameters. ? validate if the variable has value
  Route::get("Param/{Name?}",function ($Name='Daniel') {

    // Display $Name values
    return "Hi ". $Name;

  });

  // Multiples Parameters on a Url.
  Route::get("MulParam/{Name?}/{Age?}",function ($Name='Daniel', $Age="24") {

    // Display $Name and $Age Val
    return "The name is: ".$Name. " And the Age is ".$Age;

  });

} /* End Region */
