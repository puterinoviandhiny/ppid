<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Berita;
class HomeController extends Controller{
    public function index(Request $request){

        if (!empty($request->q)) {
            $data_berita['data_berita'] = Berita::where('status', 'PUBLISHED')->where('title', 'like', '%' . $request->q . '%')->orderBy('created_at', 'desc')->paginate(3);
        } else {
            $data_berita['data_berita'] = Berita::where('status', 'PUBLISHED')->orderBy('created_at', 'desc')->paginate(3);
        }
        return view('frontend.index')->with($data_berita);
    }
}

