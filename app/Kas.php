<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    protected $table = 'kas';
    protected $primaryKey = 'id_kas';
    protected $fillable = [
    	'debet', 'kredit', 'keterangan'
    ];
    
    
}
