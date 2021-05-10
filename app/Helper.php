<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Visitor;
class Helper extends Model
{

    public static function visitor()
    {
      // cek ip
      $client  = @$_SERVER['HTTP_CLIENT_IP'];
      $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
      $remote  = $_SERVER['REMOTE_ADDR'];

      if(filter_var($client, FILTER_VALIDATE_IP))
      {
          $ip = $client;
      }
      elseif(filter_var($forward, FILTER_VALIDATE_IP))
      {
          $ip = $forward;
      }
      else
      {
          $ip = $remote;
      }
      $ip;

      // // proses
      $data_lama = Visitor::where('ip_pengunjung',$ip)->where('hari_kunjungan',date("Y-m-d"))->first();
      // cek waktu sekarang
      $current = strtotime(date("Y-m-d"));
      if ($data_lama) {
        // cek waktu
        $date    = strtotime($data_lama->hari_kunjungan);

        $datediff = $date - $current;
        $difference = floor($datediff/(60*60*24));
        // jika hari masih sama
        if ($difference==0) {
           // echo 'today visit';

          $input['ip_pengunjung'] = $ip;
          $input['jumlah_kunjungan'] = $data_lama->jumlah_kunjungan + 1;
          $data_baru =Visitor::where('ip_pengunjung',$ip)->where('hari_kunjungan',date("Y-m-d"))->update($input);
          // echo 'Selamat Datang Kembali, Hari ini anda telah berkunjung sebanyak '.$input['jumlah_kunjungan'].' Kali';
        }
      }

      else{
        $input['ip_pengunjung'] = $ip;
        $input['jumlah_kunjungan'] = 1;
        $input['hari_kunjungan'] = date("Y-m-d");
        Visitor::create($input);
        // echo 'Selamat Datang , ini adalah Kunjungan pertama anda hari ini';
      }
    }

    public static function tanggal($tanggal){
      $monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
      $minutes = $tanggal->format("i");
      $hours = $tanggal->format("h");

      $day = $tanggal->format("d");
      $month = $tanggal->format("m");
      $year = $tanggal->format("Y");
      $month = (int)$month;
      // $s_month = nama_bulan($month);
      return $day.' '.$monthNames[$month-1].' '.$year;
    }
    public static function bulan($bulan){
      $bulan = (int)$bulan-1;
      $monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
      return $monthNames[$bulan];
    }

    public static function tanggal_cantik($tanggal){
      $monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
      $batu = explode('-', $tanggal);

      $day = $batu[2];
      $month = $batu[1];
      $year = $batu[0];
      $month = (int)$month;
      // $s_month = nama_bulan($month);
      return $day.' '.$monthNames[$month].' '.$year;
    }
    public static function tanggal_lengkap($tanggal){
      $monthNames = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
      $minutes = $tanggal->format("i");
      $hours = $tanggal->format("h");
      $second = $tanggal->format("s");

      $day = $tanggal->format("d");
      $month = $tanggal->format("m");
      $year = $tanggal->format("Y");
      $month = (int)$month-1;
      // $s_month = nama_bulan($month);
      return $day.' '.$monthNames[$month].' '.$year.' '.'['.$hours.':'.$minutes.':'.$second.']';
    }
    // pengunjung
    public static function date_from_db($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y');
    }
    public static function date_from_dbs($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
    }

    public static function date_to_db($date)
    {
        return \Carbon\Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }

    public static function date_full($date)
    {
      return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
    }

    public static function nama_kelurahan(){
      return Content::where('kode','kelurahan')->first()->val_1;
    }

    public static function to_rupiah($price)
    {
        return number_format($price, '0', ',', '.');
    }
}
