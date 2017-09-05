<?php

namespace GymSys\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public  function users(){
      return view('users');
    }
}
