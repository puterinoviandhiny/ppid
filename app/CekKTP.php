<?php
namespace App;
class CekKTP
{
    public $bulan;

    public $kode_provinsi;

    public $kabkota;

    public $gender;



    public static function gender($gender) {

        if (intval($gender) > 40) { 

            $tanggal_lahir_2 = intval($gender) - 40; 

            $gender = 'Wanita'; 

        } else { 

            $tanggal_lahir_2 = intval($gender); 

            $gender = 'Pria'; 

        }

        return array($tanggal_lahir_2, $gender);

    }



    public static function kabkota($kabkota) {

        if (intval($kabkota) > 70) {

            $kabkota = 'Kota';

        } else {

            $kabkota = 'Kabupaten';

        }

        return $kabkota;

    }



    public static function bulan($bulan) { 

        $bulan = intval($bulan) - 1; 

        $data = array( 

            'Januari', 

            'Februari', 

            'Maret', 

            'April', 

            'Mei', 

            'Juni', 

            'Juli', 

            'Agustus', 

            'September', 

            'Oktober', 

            'November', 

            'Desember' 

        ); 

        if (isset($data[$bulan])) { 

            return trim($data[$bulan]); 

        } 

        return false; 

    } 



    public static function kode_provinsi($kode_provinsi) { 

        $kode_provinsi = intval($kode_provinsi); 

        $data = array( 

            11 => 'Aceh', 

            12 => 'Sumatera Utara', 

            13 => 'Sumatera Barat', 

            14 => 'Riau', 

            15 => 'Jambi', 

            16 => 'Sumatera Selatan', 

            17 => 'Bengkulu', 

            18 => 'Lampung', 

            19 => 'Kep. Bangka Belitung', 

            21 => 'Kep. Riau', 

            31 => 'DKI Jakarta', 

            32 => 'Jawa Barat', 

            33 => 'Jawa Tengah', 

            34 => 'Yogyakarta', 

            35 => 'Jawa Timur', 

            36 => 'Banten', 

            51 => 'Bali', 

            52 => 'Nusa Tenggara Barat', 

            53 => 'Nusa Tenggara Timur', 

            61 => 'Kalimantan Barat', 

            62 => 'Kalimantan Tengah', 

            63 => 'Kalimantan Selatan', 

            64 => 'Kalimantan Timur', 

            71 => 'Sulawesi Utara', 

            72 => 'Sulawesi Tengah', 

            73 => 'Sulawesi Selatan', 

            74 => 'Sulawesi Tenggara', 

            75 => 'Gorontalo', 

            76 => 'Sulawesi Barat', 

            81 => 'Maluku', 

            82 => 'Maluku Utara', 

            91 => 'Papua Barat', 

            94 => 'Papua' 

        ); 

        if (isset($data[$kode_provinsi])) { 

            return trim($data[$kode_provinsi]); 

        } 

        return false; 

    }

}