<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Berita;
//use App\Visitor;
use Carbon\Carbon;
use App\TrackerSessions;
//use Tracker;
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
        $visitor_today = TrackerSessions::whereDate('created_at', Carbon::today())->where('is_robot', false)->get()->count();
        // $visitor_today = $visitor_today + 1;
        $visitor_month = TrackerSessions::whereMonth('created_at', Carbon::now()->month)->where('is_robot', false)->get()->count();
        // $visitor_month = $visitor_month + 1;
        $visitor_year = TrackerSessions::whereYear('created_at', Carbon::now()->year)->where('is_robot', false)->get()->count();
        // $visitor_year = $visitor_year + 1;
        $visitor_all = TrackerSessions::where('is_robot', false)->get()->count();
        // $visitor_all = $visitor_all + 1;

        return view('frontend.index', compact('visitor_today','visitor_month','visitor_year','visitor_all'))->with($data_berita);
    }
}

