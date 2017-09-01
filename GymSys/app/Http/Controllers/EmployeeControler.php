<?php

namespace GymSys\Http\Controllers;

use Illuminate\Http\Request;

// Allows use DataBases
use DB;

use Auth;

class EmployeeControler extends Controller
{
    //

    public function LoginView($value='')
    {
      return view("Login");
    }
    // End function

    public function LoginEmployee()
    {

      // Get Employee Number From ajax call
      $EmpNumbr=$_POST['EMPNMBR'];

      // Get Employee Pass from ajax call
      $EmpPass=$_POST['PASS'];

      // echo $EmpNumbr. " :: ".$EmpPass;

      { /* Region Create Session */

        $value = session()->get('key', 'default');
        echo $value;

      } /* End Session */

      // Validate if the user is not Loged
      if (Auth::check()) {

        Redirect::to("Test");
        echo $EmpNumbr. " :: ".$EmpPass;

      }

      { /* Region Get Employee by EmpNumber */

        // Buil the query
        $Employees = DB::table('employees')
        ->select('Name', 'FstName', 'LstName', 'EmpRoles_Id')
        ->where('Id', '=', $EmpNumbr)
        ->get();

        // Iterate over DataBase Table. Create an object from Employees dataBase table
        foreach ($Employees as $_Employee) {

          // Display Table info. Acces to the Fields database table
          echo $_Employee->Name. " :: ". $_Employee->FstName." :: ". $_Employee->LstName." :: ".$_Employee->EmpRoles_Id;

        }
        // End Foreach

      } /* End Region */

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
