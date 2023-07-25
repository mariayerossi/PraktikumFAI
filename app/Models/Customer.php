<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //---------------------------------
    protected $table ="user";
    protected $primaryKey ="id";
    public $timestamp = true;
    public $incrementing = true;
    //---------------------------------

    public function insertCustomer($data)
    {
        $cust = new Customer();
        $cust->nama = $data["nama"];
        $cust->username = $data["username"];
        $cust->password = $data["password"];
        $cust->gambar_profil = $data["gambar"];
        $cust->telpon = $data["telpon"];
        $cust->alamat = $data["alamat"];
        $cust->gender = $data["gender"];
        $cust->tanggal_lahir = $data["tanggal_lahir"];
        $cust->saldo = 0;
        $cust->locked = "false";
        $cust->save();
    }

    public function updateCustomer($data)
    {
        $cust = Customer::find($data["id"]);
        $cust->nama = $data["nama"];
        $cust->username = $data["username"];
        $cust->password = $data["password"];
        $cust->gambar_profil = $data["gambar"];
        $cust->telpon = $data["telpon"];
        $cust->alamat = $data["alamat"];
        $cust->gender = $data["gender"];
        $cust->tanggal_lahir = $data["tanggal_lahir"];
        $cust->save();
    }

    public function updateMember($data)
    {
        $cust = Customer::find($data["id"]);
        $cust->nama = $data["nama"];
        $cust->telpon = $data["telpon"];
        $cust->alamat = $data["alamat"];
        $cust->gender = $data["gender"];
        $cust->gambar_profil = $data["gambar"];
        $cust->save();
    }

    public function insertSaldo($data)
    {
        $cust = Customer::find($data["id"]);
        $cust->saldo = $data["saldo"];
        $cust->save();
    }

    public function updateFoto($data)
    {
        $cust = Customer::find($data["id"]);
        $cust->gambar_profil = $data["gambar"];
        $cust->save();
    }

    public function updateLock($data)
    {
        $cust = Customer::find($data["id"]);
        $cust->locked = $data["lock"];
        $cust->save();
    }
}
