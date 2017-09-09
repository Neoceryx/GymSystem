<?php

namespace GymSys\Http\Controllers;

use Illuminate\Http\Request;

// Load Members Model
use GymSys\MembersModel;

// Database Library
use DB;

class MembersController extends Controller
{

    public function GetMembers()
    {

      // Get Members list from MembersModel
      $Memlist =MembersModel::GetMembers();

      // Retrun view whit the assosiative arry to can show members info on the view
      return view("EmployeesViews.MembersList",["Members"=>$Memlist]);

      //debugger
      // dd($Memlist;);

    }
    // End function

    public function GetMbrById()
    {

      // Get MemberId from ajax call
      $IdMember=$_POST["IDMBR"];
      // echo $IdMember;

      // Build the query
      $MbrInfo=DB::table("members")
      ->where('Id', '=', $IdMember)
      ->get();

      // Iterate over the table
      foreach ($MbrInfo as $_member) {

        // Display table info
        echo $_member->Name;

      }

    }
    // End function

}
// End Controller
