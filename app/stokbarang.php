<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stokbarang extends Model
{
  protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
    		'namabarang', 'jumlah', 'harga', 'id_supplier'
    ];
    public $timestamps = false;

    public function penjualan(){
      return $this->hasMany('App\Penjualan','id_barang');
    }

         public function pembelian(){
        return $this->hasMany('App\pembelian');
    }

    public function supplier(){
        return $this->belongsTo('App\supplier','id_supplier');
    }
}
