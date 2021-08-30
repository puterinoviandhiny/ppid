<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Permintaan;
use App\Models\Pemohon;
use App\Models\Skpd;
use App\CekKTP;
class FormPermintaanController extends Controller{
    public function index(){
        $skpd = Skpd::all();
        return view('frontend.formpermintaan.index', compact('skpd'));
    }
    public function store(Request $request){
        $skpd = Skpd::all();
        $pemohon = new Pemohon();
        $permintaan = new Permintaan();

        $pemohon->nama = $request->input('nama');
        $pemohon->nik = $request->input('nik');
        $pemohon->alamat = $request->input('alamat');
        $pemohon->email = $request->input('email');
        $pemohon->telepon = $request->input('telepon');
        $pemohon->kategori_pemohon = $request->input('kategori_pemohon');
        $pemohon->pekerjaan = $request->input('pekerjaan');
        $pemohon->file_ktp = $request->file('file_ktp');
        $pemohon->file_akta = $request->file('file_akta');

        $pemohon->save();

        $permintaan->id_skpd = $request->input('id_skpd');
        $permintaan->kode_permohonan = $request->input('kode_permohonan');
        $permintaan->rincian = $request->input('rincian');
        $permintaan->tindak_lanjut = $request->input('tindak_lanjut');
        $permintaan->cara = $request->input('cara');
        $permintaan->tujuan = $request->input('tujuan');

        $permintaan->pemohon()->associate($pemohon);
        $permintaan->skpd()->associate($permintaan);
        $permintaan->save();

        return view('frontend.formpermintaan.index', compact('skpd'))->with('flag',1);
    }
}
