<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FormKeberatanController extends Controller{
    public function index(){

    return view('frontend.formkeberatan.index');

    }
}
