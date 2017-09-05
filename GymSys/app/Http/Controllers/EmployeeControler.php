<?php

namespace GymSys\Http\Controllers;

use Illuminate\Http\Request;

// Allows use DataBases
use DB;

use Illuminate\Support\Facades\Auth;


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

      // Region Variables
      $EmpName=" ";
      $EmpRoleId="";

      // Get Employee Number From ajax call
      $EmpNumbr=$_POST['EMPNMBR'];

      // Get Employee Pass from ajax call
      $EmpPass=$_POST['PASS'];

      // echo $EmpNumbr. " :: ".$EmpPass;

      { /* Region Get Employee by EmpNumber */

        // Buil the query
        $Employees = DB::table('employees')
        ->select('Name', 'FstName', 'LstName', 'EmpRoles_Id')
        ->where('Id', '=', $EmpNumbr )
        ->where('password', '=',$EmpPass)
        ->get();

        // Iterate over DataBase Table. Create an object from Employees dataBase table
        foreach ($Employees as $_Employee) {

          // Storage the Employe  Info int the veriables
          $EmpName=$_Employee->Name;
          $EmpRoleId=$_Employee->EmpRoles_Id;

        }
        // End Foreach

      } /* End Region */

      { /* Region Log User */

        if ($EmpName==" ") {

          echo "0";

        }else {

          // Specifying a default value...
          $value = session('Name');

          // Store a piece of data in the session...
          session(['Name' => $EmpName , 'Role'=>$EmpRoleId]);

          // Validate session variable
          if ( session()->has('Name')  ) {

            // redirect user to the view
            echo "1 :: ". session()->get('Role');

          }
          // End If

        }

      } /* End Region */

    }
    // End function

    public function LogOut($value='')
    {

      // Destroy the Session
      session()->flush();

      echo "LogOut";
    }
    //End function

    public function AdminDashboard()
    {

      // Return View
      return view("AdminViews.Dashboard");

    }
    // End function

    public function NormalEmpDashBoard()
    {

      // Return View
      return view("EmployeesViews.Dashboard");

    }

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
