<?php

namespace GymSys\Http\Controllers;

use Illuminate\Http\Request;

// Load Members Model
use GymSys\MembersModel;

class MembersController extends Controller
{
    public function FunctionName()
    {
      return "Hello";
    }

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

}
