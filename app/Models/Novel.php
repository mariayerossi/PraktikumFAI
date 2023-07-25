<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use HasFactory;

    //---------------------------------
    protected $table ="novel";
    protected $primaryKey ="novel_id";
    public $timestamp = true;
    public $incrementing = true;
    //---------------------------------

    public function insertNovel($data)
    {
        $nov = new Novel();
        $nov->kode = $data["kode"];
        $nov->judul = $data["judul"];
        $nov->deskripsi = $data["deskripsi"];
        $nov->gambar = $data["gambar"];
        $nov->harga = $data["harga"];
        $nov->terjual = 0;
        $nov->pengarang = $data["pengarang"];
        $nov->save();
    }

    public function deleteNovel($id) {
        $nov = Novel::find($id);
        $nov->delete();
    }

    public function updateNovel($data)
    {
        // dd($data);
        $nov = Novel::find($data["id"]);
        $nov->judul = $data["judul"];
        $nov->deskripsi = $data["deskripsi"];
        $nov->harga = $data["harga"];
        $nov->kode = $data["kode"];
        $nov->save();
    }
}
