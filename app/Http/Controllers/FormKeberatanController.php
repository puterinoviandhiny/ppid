<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;
use DB;
class FormKeberatanController extends Controller{
    public function index(){
        return view('frontend.formkeberatan.index');
    }

    public function informasi_by_nik(Request $request)
    {
        return Permintaan::where('noktp', 'like', '%'.$request->nik.'%')->get();
    }

    public function informasi_by_id(Request $request)
    {
        return Permintaan::find($request->id_informasi);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
