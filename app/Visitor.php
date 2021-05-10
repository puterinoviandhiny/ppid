<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitor';

    protected $fillable = ['ip_pengunjung', 'jumlah_kunjungan','hari_kunjungan'];

    public $timestamps = true;
   	protected $primaryKey = 'id';
}
