<?php

namespace GymSys\Http\Controllers;

use Illuminate\Http\Request;

// Allows use DataBases
use DB;

// Load Employee Model
use GymSys\EmployeeModel;

use Illuminate\Support\Facades\Auth;

class EmployeeControler extends Controller
{


    public function LoginView()
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

    public function LogOut()
    {

      // Destroy the Session
      session()->flush();

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
    // End function

    public function AddMember()
    {

      // Get Member name from ajax call
      $Name=$_POST['MBRNAE'];

      // Get Member FirstName
      $FstName=$_POST["FSTNAME"];

      // Get lastName
      $LstName=$_POST["LSTNAME"];

      // Get Phone
      $Phone=$_POST["PHONE"];

      // Get Emial
      $Email=$_POST["EMAIL"];

      // Get Addres
      $Adrss=$_POST["ADRSS"];

      // Get picture Name
      $PicName=$_POST['PICNAME'];

      // Get current date and time
      $CrrntDate = date('Y-m-d H:i:s');

      // Specify path member folder and name
      $MBRFOLDER="Pictures/Members/".$Name."";

      // Store the folder path into the session variable
      session()->put('MemberFolderPath', $MBRFOLDER);

      // Initialize the variable
      $MbrExist="";

      //  echo $Name." : ".$FstName." : ".$LstName." : ".$Phone." : ".$Email.":".$Adrss;

      { /* Region Register new member */

        // Get the numbers of repeats from a new member
        $MbrExist = DB::table('members')
        ->where([
          ["Name", "like" , "%$Name%"],
          ["FstName", "like" , "%$FstName%"],
          ["LstName", "like" , "%$LstName%"]
        ])
        ->count();
        // select count(*) from members where(Name = '' AND FstName='' AND LstName='')

        // Validate if the new members is not registered
        if ( $MbrExist == "" ) {

          echo "0";

          // Build the query
          DB::table('members')->insert([
              'Name' => $Name,
              'FstName'=>$FstName,
              'LstName'=>$LstName,
              'Phone'=>$Phone,
              'Email'=>$Email,
              'Address'=>$Adrss,
              'MemPhotoPath'=>$MBRFOLDER."/".$PicName,
              'RgstrDate'=>$CrrntDate
            ]);

        }else {

          // Print the numbers of repeats from the member
          echo $MbrExist;

        }
        // End validation

      } /* End Region */

      { /* Region Upload Picture member */

        // Validate if member folder exist
        if (!file_exists($MBRFOLDER)) {

          // Create Member folder
          mkdir($MBRFOLDER, 0700);

        }
        // End validation

      } /* End region */

    }
    // End function

    public function UploadPicture()
    {

      // Get the member folder path
      $MbrPath=session()->get('MemberFolderPath');

      // Validate if the img has errors
      if ( 0 < $_FILES['file']['error'] ) {

        // error Message
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';

      }
      else {

        // Upload the img to the member folder
        move_uploaded_file($_FILES['file']['tmp_name'], "$MbrPath"."/" . $_FILES['file']['name']);

      }

      // Destroy the session variable whit the folder path
      session()->forget('MemberFolderPath');

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


    public function AddEmployee()
    {

      // Get Employe Name from Ajax call
      $EmpName = $_POST["NAME"];

      // Get Emplye Fst Name
      $EmpFstName=$_POST['FSTNAME'];

      // Get Employee Lst Name
      $EmpLstName=$_POST['LSTNAME'];

      // Get Emplye Address
      $EmpAddrs=$_POST['ADDRSS'];

      // Get Employee Email.
      $EmpMail=$_POST['MAIL'];

      // Get Employe Pass
      $EmpPass=$_POST['PASS'];

      // Get Employe Phone
      $EmpPhone=$_POST['PHONE'];

      // Get Employee Role Id
      $EmpRoleId=$_POST['ROLEID'];

      $EmpPicture="";

      // Get Current DateTime
      $CrrntDate = date('Y-m-d H:i:s');

      // Debugger
      // echo $EmpName." :: ".$EmpFstName."::".$EmpLstName."::".$EmpAddrs."::".$EmpMail."::".$EmpPass."::".$EmpPhone."::".$EmpRoleId;

      // Build the query. To add new Employee
      DB::table('employees')->insert([
        'Name'=>$EmpName,
        'FstName'=>$EmpFstName,
        'LstName'=>$EmpLstName,
        'Address'=>$EmpAddrs,
        'Email'=>$EmpMail,
        'password'=>$EmpPass,
        'Phone'=>$EmpPhone,
        'EmpPhotoPath'=>$EmpPicture,
        'RegisterDate'=>$CrrntDate,
        'EmpRoles_Id'=>$EmpRoleId
        ]);

    }
    // End Function

    public function GetEmployeeRoles()
    {

      $post = EmployeeModel::GetEmployeeRoles();

    }

}
// End Class
