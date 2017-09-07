<?php

namespace GymSys;

use Illuminate\Database\Eloquent\Model;

// Allows use DataBases
use DB;

class MembersModel extends Model
{
  // The table associated with the model.
  protected $Table = "Members";

  public static function GetMembers()
  {

    // Buildd the query
    $users = DB::table('Members')->get();
    return $users;

  }
  // End function

}
