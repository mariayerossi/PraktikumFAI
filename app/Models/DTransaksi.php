<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTransaksi extends Model
{
    use HasFactory;

    //---------------------------------
    protected $table ="dtrans";
    protected $primaryKey ="id";
    public $timestamp = true;
    public $incrementing = true;
    //---------------------------------

    public function insertDtrans($data)
    {
        $trans = new DTransaksi();
        $trans->htrans_id = $data["htrans"];
        $trans->membership = $data["membership"];
        $trans->durasi = $data["durasi"];
        $trans->subtotal = $data["subtotal"];
        $trans->save();
    }
}
