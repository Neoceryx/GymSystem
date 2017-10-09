<?php

namespace GymSys;

use Illuminate\Database\Eloquent\Model;


// Allows use DataBases
use DB;

class EmployeeModel extends Model
{

  // The table associated with the model.
  protected $Table = "Members";

  public static function GetEmployeeRoles()
  {

    // Build the query.
    $EmpRoles=DB::table("EmpRoles")->get();

    // Iterate over the DataBase Table
    foreach ( $EmpRoles as $_EmpRole ) {

      // create Objet from the Emproles table. To acces their fiels
      echo "
      <option value=".$_EmpRole->Id.">".$_EmpRole->Description."</option>
      ";

    }

  }
  // End function

  public static function AddNewEmployee($EmpName, $EmpFstName, $EmpLstName,$EmpAddrs, $EmpMail, $EmpPass, $EmpPhone, $EmpPicture, $CrrntDate, $EmpRoleId )
  {

    // Count the times numbers that an new employe apears on the table
    $EmpExist = DB::table('employees')
    ->where([
      ["Name", "like" , "%$EmpName%"],
      ["FstName", "like" , "%$EmpFstName%"],
      ["LstName", "like" , "%$EmpLstName%"]
    ])
    ->count();

    //Debugger
    //dd($EmpExist);

    // Validate if the new employees dont exit.
    if ( $EmpExist == 0 ) {

      // Return the  repeats number
      echo $EmpExist;

      { /* Region Create folder To upload Pictures  */

        // Path where Folder Employee will be created
        $FolderPath="Pictures/Employees/".$EmpName;

        // // Validate if the folder exist
        if ( !file_exists($FolderPath) ) {

          // create folder whit the Employee Name
          mkdir($FolderPath, 0777, true);

          //Store the Folder path into a sesion
          session()->put('FolderEmp', $FolderPath);

        }else {

          // create folder whit the complete employee Name
          mkdir($FolderPath."_".$EmpFstName."_".$EmpLstName, 0777, true);

          //Store the Folder path into a sesion
          session()->put('FolderEmp', $FolderPath."_".$EmpFstName."_".$EmpLstName);

        }

      } /* End Region */

      // Build the query. To add new Employee
      DB::table('employees')->insert([
        'Name'=>$EmpName,
        'FstName'=>$EmpFstName,
        'LstName'=>$EmpLstName,
        'Address'=>$EmpAddrs,
        'Email'=>$EmpMail,
        'password'=>$EmpPass,
        'Phone'=>$EmpPhone,
        'EmpPhotoPath'=> session()->get('FolderEmp')."/". $EmpPicture,
        'RegisterDate'=>$CrrntDate,
        'EmpRoles_Id'=>$EmpRoleId
        ]);

    }else {

      // Retrun the numbers of apears for teh new employee
      echo $EmpExist;

    }
    // End Validation

    }
    // End Function

  public static function UploadEmpImg()
    {

      // Validate if the img has errors
      if ( 0 < $_FILES['file']['error'] ) {

        echo 'Error: ' . $_FILES['file']['error'] . '<br>';

      }
      else {

        // Upload the Img into the folderPath. Recover from session
        move_uploaded_file($_FILES['file']['tmp_name'], session()->get('FolderEmp')."/".$_FILES['file']['name']);

      }

      // Destroy session Values
      session()->forget('FolderEmp');

    }

  public static function GetEmployees()
  {
    // Build the query
     return $Employees=DB::table("employees")
     ->join("emproles","employees.EmpRoles_Id", "=" ,"emproles.Id")
     ->select("employees.*",'emproles.Description as RoleDesc')
     ->get();
  }


}
