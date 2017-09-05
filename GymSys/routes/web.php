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

// Route::get('/', function () {
//     return view('welcome');
// });
// Display Login view
Route::get('/', "EmployeeControler@LoginView");

// Login Method
Route::post("LoginEmp", "EmployeeControler@LoginEmployee");

//Logout
Route::post("LogOut","EmployeeControler@LogOut");

// Admin Dashboards
Route::get("Admin","EmployeeControler@AdminDashboard");

// Normal employee Dashboard
Route::get("Employee","EmployeeControler@NormalEmpDashBoard");

Route::get("t",function ()
{
  // Rediret user to login form
  return redirect('/');
});

//Route::get('users', "UsersController@users");
Route::get('user', ['as' => 'users' , 'uses' => 'UsersController@users']);
//que ess commit
Route::get('create', ['as' => 'create' , 'uses' => 'MemberController@create']);
Route::post('store', ['as' => 'store' , 'uses' => 'MemberController@store']);
Route::get('show', ['as' => 'show' , 'uses' => 'MembersController@show']);

Route::get('membercreate', ['as' => 'membercreate' , 'uses' => 'MembersController@show']);

//Route::get('member/create', ['as' => 'members.create' , 'uses' => 'MembersController@membercreate']);

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

  // Display DataBase Info
  Route::get("Employees", "EmployeeControler@GetEmployees");

} /* End Region */
