<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;

class RolesController extends Controller
{
    public function index(){
      $roles=Role::all();
      return view('roles.list', compact('roles'));
    }

    public function create(){
      return view('roles.create');
    }

    public function store(Request $request){
      $role=new Role(array(
        'name'=>$request->get('name'),
        'display_name'=>$request->get('display_name'),
        'description'=>$request->get('description')
      ));
      $role->save();
      return redirect('/roles/create')->with('status','成功建立新職能');
    }
}
