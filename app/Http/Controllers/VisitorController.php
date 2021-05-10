<?php

namespace App\Http\Controllers\Backand;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Visitor;
use Yajra\Datatables\Datatables;

class VisitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Visitor::orderBy('id','desc')->paginate(10);
        $jumlah_kunjungan= \App\Helper::to_rupiah(Visitor::all()->sum('jumlah_kunjungan'));
        $jumlah_kunjungan_bulan_ini= \App\Helper::to_rupiah(Visitor::whereMonth('created_at','=',date('m'))->sum('jumlah_kunjungan'));
        $jumlah_pengunjung= \App\Helper::to_rupiah(Visitor::select('ip_pengunjung')->distinct('ip_pengunjung')->count());
        return view('backend.visitor.index',compact('data','jumlah_kunjungan','jumlah_pengunjung','jumlah_kunjungan_bulan_ini'));
    }

    public function delete(Request $request)
    {
        $data = Visitor::find($request->input('id'));
        $data->delete();
        return redirect()->back()->with('success','Pengunjung telah dihapus');
    }

    public function get_visitor(Request $request)
    {
        $data = Visitor::select(['id', 'ip_pengunjung', 'jumlah_kunjungan', 'hari_kunjungan', 'created_at', 'updated_at'])->orderBy('id','desc');

        if (($request->has('mulai') && $request->has('akhir')) && ($request->mulai != null && $request->akhir != null )) {
            $mulai = \App\Helper::date_to_db($request->mulai);
            $akhir = \App\Helper::date_to_db($request->akhir);
            $data->whereBetween('created_at', [$mulai, $akhir]);
        }

        if ($request->has('ip') && $request->ip != null) {
            $data->where('ip_pengunjung', 'like', '%' .$request->ip. '%');
        }

        return Datatables::of($data)
            // ->addColumn('hari_kunjungan', function ($data) {
            //     return \App\Helper::tanggal_cantik($data->hari_kunjungan);
            // })
            ->addColumn('hari_kunjungan', function($data){
                return \App\Helper::date_from_db($data->hari_kunjungan);
            })
            ->addColumn('created_at', function($data){
                return \App\Helper::date_full($data->created_at);
            })
            ->addColumn('updated_at', function($data){
                return \App\Helper::date_full($data->updated_at);
            })
            ->addColumn('action', function ($data) {
                return '<a class="btn btn-danger btn-sm" data-toggle="modal" href="#m_hapus-'.$data->id.'"><i class="ft ft-trash"></i>Hapus</a>';
            })
            ->make(true);
    }

}
