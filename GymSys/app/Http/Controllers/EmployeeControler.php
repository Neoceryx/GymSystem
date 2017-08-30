<?php

namespace GymSys\Http\Controllers;

use Illuminate\Http\Request;

// Allows use DataBases
use DB;

class EmployeeControler extends Controller
{
    //

    public function Login($value='')
    {
      return view("Login");
    }
    // End function



    public function GetEmployees()
    {

      // Buil the query
      $Employees = DB::table('Employees')->get();

      // Iterate over DataBase Table. Create an object from Employees dataBase table
      foreach ($Employees as $_Employee) {

        // Display Table info. Acces to the Fields database table
        echo $_Employee->Name. " :: ". $_Employee->FstName." :: ". $_Employee->LstName. " :: ".$_Employee->Address." :: ".$_Employee->Phone;

      }
      // End Foreach

    }
    // End function


}
// End Class
