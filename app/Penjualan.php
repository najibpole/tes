<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    protected $fillable = [
    		'id_barang', 'jumlah', 'status', 'totalharga'
    ];

    public function barang(){
        return $this->belongsTo('App\stokbarang','id_barang');
    }

}
