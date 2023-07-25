<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    //---------------------------------
    protected $table ="htrans";
    protected $primaryKey ="id";
    public $timestamp = true;
    public $incrementing = true;
    //---------------------------------

    public function insertHtrans($data)
    {
        $trans = new Transaksi();
        $trans->pembeli = $data["pembeli"];
        $trans->total = $data["total"];
        $trans->save();
    }
}
