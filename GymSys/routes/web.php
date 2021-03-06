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

// Regiter Member
Route::post("AddMember", "EmployeeControler@AddMember");

// Upload Picture
Route::post("UploadImg", "EmployeeControler@UploadPicture");

// Members list
Route::get("Members","MembersController@GetMembers");

// Member details Info
Route::post("MemberInfo", "MembersController@GetMbrById");

// Add new Employee
Route::post("AddEmployee", "EmployeeControler@AddEmployee");

// Get Employee Roles
Route::get("EmpRoles", "EmployeeControler@GetEmployeeRoles");

// Upload Employee Image
Route::post("UploadEmpImg", "EmployeeControler@UploadEmpImg");

Route::get("EmployeesList","EmployeeControler@GetAllEmployees");

Route::get("t",function ()
{
  // Rediret user to login form
  return redirect('/');
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

  // Display DataBase Info
  Route::get("Employees", "EmployeeControler@GetEmployees");

} /* End Region */
