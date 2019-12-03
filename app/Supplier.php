<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $fillable = [
    		'namasupp', 'alamat', 'nohp',
    ];
    public $timestamps = false;

     public function pembelian(){
        return $this->hasMany('App\pembelian');
    }
}
