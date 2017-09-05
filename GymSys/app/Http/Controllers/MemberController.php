<?php

namespace GymSys\Http\Controllers;
//namespace GymSys\Http\Request;
use DB;
use App\Http\Requests\CreateMemberRequest;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateMemberRequest;
//use app\Http\Request\CreateMemberRequest;

class MemberController extends Controller
{
  public function __construct()
  {
    //$this->middleware('Verifytoken' , ['only' => ['store'] ]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('members/membershow');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members/membercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {
      $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'email' => 'required|email'
      ]);
      DB::table('member')->insert([
        'fullname' => $request->input('first_name'),
        'fstname' => $request->input('last_name'),
        'lstname' => $request->input('address'),
        'phone' => $request->input('city'),
        'address' => $request->input('state'),
        'memphotopath' => $request->input('country'),
        'email' => $request->input('email'),
      ]);
        return '$request->all();';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(/*$id*/)
    {
        return view('members/membershow');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('members/membershow');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
