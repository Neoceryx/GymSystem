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

}
