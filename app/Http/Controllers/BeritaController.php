<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Berita;

class BeritaController extends Controller{
    public function index(Request $request){

        if (!empty($request->q)) {
            $data_berita['data_berita'] = Berita::where('status', 'PUBLISHED')->where('title', 'like', '%' . $request->q . '%')->orderBy('created_at', 'desc')->paginate(3);
        } else {
            $data_berita['data_berita'] = Berita::where('status', 'PUBLISHED')->orderBy('created_at', 'desc')->paginate(3);
        }
        return view('frontend.berita.index')->with($data_berita);
    }

    public function show($id)
    {
        $data_berita = array(
            'data_berita' => Berita::where('status', 'Published')->where('slug', $id)->firstOrFail()
        );
        $latest = Berita::where('status', 'Published')->orderBy('created_at', 'desc')->get();
        return view('frontend.berita.show', compact('latest'))->with($data_berita);
    }

}

