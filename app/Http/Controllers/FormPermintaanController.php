<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Permintaan;
use App\Models\Skpd;
class FormPermintaanController extends Controller{
    public function index(){

    $skpd = Skpd::all();
    return view('frontend.formpermintaan.index', compact('skpd'));

    }

    public function store(Request $request)
    {
          // validasi form
          $this->validate($request, [
            'scan_ktp'    => 'required|file|mimes:pdf,docx,xlx,csv,jpeg'
        ]);

        dd('test');
        // upload gambar
        $file = $request->file('scan_ktp');
        $fileName = str_replace(" ","_",$request->input('noktp')).time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path("/uploads/ktp/"), $fileName);
        $request->request->add([
            'doc'     => 'uploads/ktp/'.$fileName
        ]);

        $form = new Permintaan();

        $form->id_skpd = request('id_skpd');
        $form->pemohon = request('pemohon');
        $form->kelamin = request('kelamin');
        $form->usia = request('usia');
        $form->noktp = request('noktp');
        $form->scan_ktp = $request->file('scan_ktp');
        $form->alamat = request('alamat');
        $form->pekerjaan = request('pekerjaan');
        $form->telepon = request('telepon');
        $form->fax = request('fax');
        $form->email = request('email');
        $form->informasi_diminta = request('informasi_diminta');
        $form->alasan = request('alasan');
        $form->cara = request('cara');
        $form->id_tindak_lanjut = request('id_tindak_lanjut');
        $form->url_file = $request->doc;
        $form->save();

        return view('frontend.formpermintaan.index')->with('flag', 1);
    }
}
