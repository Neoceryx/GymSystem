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

    }else {

      // Retrun the numbers of apears for teh new employee
      echo $EmpExist;

    }
    // End function

    }
    // End Function

}
