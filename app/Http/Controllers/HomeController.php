<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Berita;
use App\Visitor;
class HomeController extends Controller{
    public function index(Request $request){

        if (!empty($request->q)) {
            $data_berita['data_berita'] = Berita::where('status', 'PUBLISHED')->where('title', 'like', '%' . $request->q . '%')->orderBy('created_at', 'desc')->paginate(3);
        } else {
            $data_berita['data_berita'] = Berita::where('status', 'PUBLISHED')->orderBy('created_at', 'desc')->paginate(3);
        }

        $today = date('Y-m-d');
        $month = date('Y-m');
        $year = date('Y');
        $visitor_today = Visitor::where('hari_kunjungan', 'LIKE', '%' . $today . '%')->distinct('ip_pengunjung')->count('ip_pengunjung');
        $visitor_today = $visitor_today + 1;
        $visitor_month = Visitor::where('hari_kunjungan', 'LIKE', '%' . $month . '%')->distinct('ip_pengunjung')->count('ip_pengunjung');
        $visitor_month = $visitor_month + 1;
        $visitor_year = Visitor::where('hari_kunjungan', 'LIKE', '%' . $year . '%')->distinct('ip_pengunjung')->count('ip_pengunjung');
        $visitor_year = $visitor_year + 1;
        $visitor_all = Visitor::distinct('ip_pengunjung')->count('ip_pengunjung');
        $visitor_all = $visitor_all + 1;

        return view('frontend.index', compact('visitor_today','visitor_month','visitor_year','visitor_all'))->with($data_berita);
    }
}

