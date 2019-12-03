<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
        protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';
    protected $fillable = [
    		'id_barang', 'id_supplier', 'jumlah', 'tanggal'
    ];

        public function supplier(){
      return $this->belongsTo('App\Supplier','id_supplier');
    }

     public function barang(){
      return $this->belongsTo('App\stokbarang','id_barang');
    }
}
