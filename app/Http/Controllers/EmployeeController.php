<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Http\Requests;
use App\User;

class EmployeeController extends Controller
{
  public function index(){
    $employees=User::all();
    return view('employee.index',compact('employees')); 
  }
}
