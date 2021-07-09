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
            'scan_ktp'          => 'required|file|mimes:pdf,docx,xlx,csv,jpeg,jpg,png',
            'pemohon'           => 'required',
            'kelamin'           => 'required',
            'usia'              => 'required',
            'noktp'             => 'required',
            'pekerjaan'         => 'required',
            'alamat'            => 'required',
            'telepon'           => 'required',
            'fax'               => 'required',
            'email'             => 'required',
            'informasi_diminta' => 'required',
            'alasan'            => 'required',
            'cara'              => 'required',
            'id_tindak_lanjut'  => 'required',
        ],[
            'scan_ktp.required'          => 'Harap lampirkan scan KTP anda',
            'scan_ktp.mimes'             => 'File Scan hanya berupa file jpg dan png',
            'pemohon.required'           => 'Harap isi nama anda',
            'kelamin.required'           => 'Harap isi jenis kelamin anda',
            'usia.required'              => 'Harap isi usia anda',
            'noktp.required'             => 'Harap isi NIK anda',
            'pekerjaan.required'         => 'Harap isi Pekerjaan anda',
            'alamat.required'            => 'Harap isi alamat anda',
            'telepon.required'           => 'Harap isi telepon anda',
            'fax.required'               => 'Harap isi fax anda',
            'email.required'             => 'Harap isi email anda',
            'informasi_diminta.required' => 'Harap isi informasi yang anda minta',
            'alasan.required'            => 'Harap isi alasan anda meminta informasi',
            'cara.required'              => 'Harap isi cara anda mendapatkan informasi',
            'id_tindak_lanjut.required'  => 'Harap isi tindak lanjut anda',
        ]);
        // upload gambar
        $file = $request->file('scan_ktp');
        $fileName = str_replace(" ","_",$request->input('noktp')).time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path("/uploads/ktp/"), $fileName);
        $request->request->add([
            'doc'     => 'uploads/ktp/'.$fileName
        ]);

        try {
            $form = new Permintaan();
            $form->id_skpd           = $request->id_skpd;
            $form->pemohon           = $request->pemohon;
            $form->kelamin           = $request->kelamin;
            $form->usia              = $request->usia;
            $form->noktp             = $request->noktp;
            $form->scan_ktp          = $fileName;
            $form->alamat            = $request->alamat;
            $form->pekerjaan         = $request->pekerjaan;
            $form->telepon           = $request->telepon;
            $form->fax               = $request->fax;
            $form->email             = $request->email;
            $form->informasi_diminta = $request->informasi_diminta;
            $form->alasan            = $request->alasan;
            $form->cara              = $request->cara;
            $form->id_tindak_lanjut  = $request->id_tindak_lanjut;
            $form->url_file          = $request->doc;
            $form->save();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Tersimpan'
        ]);
    }
}
