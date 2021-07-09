<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Permintaan;
use App\Models\Skpd;
use App\CekKTP;
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
            'noktp'             => 'required|min:16|max:20',
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
            'noktp.min'                  => 'Minimal NIK 16 digit',
            'noktp.max'                  => 'Maksimal NIK 20 digit',
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
        // Validasi NIK
        $nik  = trim($request->noktp);
        $data = [];
        $data['provinsi']      = substr($nik, 0, 2);
        $data['kota']          = substr($nik, 2, 2);
        $data['kecamatan']     = substr($nik, 4, 2);
        $data['tanggal_lahir'] = substr($nik, 6, 2);
        $data['bulan_lahir']   = substr($nik, 8, 2);
        $data['tahun_lahir']   = substr($nik, 10, 2);
        $data['unik']          = substr($nik, 12, 4);
        if (intval($data['tanggal_lahir']) > 40) { 
            $data['tanggal_lahir_2'] = intval($data['tanggal_lahir']) - 40; 
            $gender = 'Wanita'; 
        } else { 
            $data['tanggal_lahir_2'] = intval($data['tanggal_lahir']); 
            $gender = 'Pria'; 
        }

        $kodeprov     = New CekKTP;
        $kodeprovinsi = $kodeprov->kode_provinsi($data['provinsi']);
        if ($kodeprovinsi == false) {
            return response()->json([
                'status' => false,
                'message' => 'NIK Salah'
            ]);
        }
        $kodekab      = New CekKTP;
        $kodekabkota  = $kodekab->kabkota($data['kota']);
        if ($kodekabkota == false) {
            return response()->json([
                'status' => false,
                'message' => 'NIK Salah'
            ]);
        }
        $tgllhr = New CekKTP;
        $tgllhr2 = $tgllhr->gender($data['tanggal_lahir_2']);
        $bln = New CekKTP;
        $bulan = $bln->bulan($data['bulan_lahir']);

        $detail_noktp = '
        <table border="1" cellpadding="5" cellspacing="0"> 
            <tr> 
                <th>Angka</th> 
                <th>Kode</th> 
                <th>Arti</th> 
            </tr> 
            <tr><td>'.$data['provinsi'].'</td> 
                <td>Provinsi</td> 
                <td>'.$kodeprovinsi.'</td> 
            </tr> 
            <tr valign="top"><td>'.$data['kota'].'</td> 
                <td>Kota / Kabupaten</td> 
                <td><a href="http://www.kemendagri.go.id/pages/data-wilayah">Cek di sini</a><br /> 
                    <span style="font-weight:900;color:#00F">'.$kodekabkota.'</span></td> 
            </tr> 
            <tr><td>'.$data['kecamatan'].'</td> 
                <td>Kecamatan</td> 
                <td><a href="http://www.kemendagri.go.id/pages/data-wilayah">Cek di sini</a></td> 
            </tr> 
            <tr valign="top"><td>'.$data['tanggal_lahir'].'</td> 
                <td>Tanggal Lahir</td> 
                <td>'.$tgllhr2[0].'<br /><span style="font-weight:900;color:#00F">'.$tgllhr2[1].'</span></td> 
            </tr> 
            <tr><td>'.$data['bulan_lahir'].'</td> 
                <td>Bulan Lahir</td> 
                <td>'.$bulan.'</td> 
            </tr> 
            <tr><td>'.$data['tahun_lahir'].'</td> 
                <td>Tahun Lahir</td> 
                <td>'.$data['tahun_lahir'].'</td> 
            </tr> 
            <tr><td>'.$data['unik'].'</td> 
                <td>Nomor Urut</td> 
                <td>'.$data['unik'].'</td> 
            </tr> 
        </table> 
        ';
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
            $form->detail_noktp      = $detail_noktp;
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
