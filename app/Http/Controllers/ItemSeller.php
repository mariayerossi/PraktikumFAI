<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ItemSeller extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function item()
    {
        // if (!Session::has("login")) {
        //     return redirect('/login');
        // }
        $param["cari"] = "";
        return view("seller.listItem")->with($param);
    }

    public function addItem()
    {
        return view("seller.addItem");
    }

    public function listNovel()
    {
        return view("admin.listNovel");
    }

    public function editNovel(Request $req)
    {
        $param["idx"] = $req->idx;
        return view("admin.editNovel")->with($param);
    }

    public function add(Request $req)
    {
        if ($req->nama != "" && $req->desc != "" && $req->harga != "" && $req->file("files") != null) {
            if (is_numeric($req->harga)) {
                $file = $req->file("files");
                if ($file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "png") {
                    $huruf = strtoupper(substr($req->nama, 0,3));
                    $arr = [];

                    $data = DB::table('novel')->get("kode");
                    if ($data != null) {
                        foreach ($data as $key => $value) {
                            if (preg_match("/$huruf/i", $value->kode)) {
                                $urut = intval(substr($value->kode, 3,5));
                                array_push($arr,$urut);
                            }
                            else {
                                $kode = $huruf."00001";
                            }
                        }
                        if ($arr != null) {
                            $max = max($arr) + 1;
                            if ($max < 10) {
                                $kode = $huruf."0000".$max;
                            }
                            else if ($max > 9) {
                                $kode = $huruf."000".$max;
                            }
                            else if ($max > 99) {
                                $kode = $huruf."00".$max;
                            }
                        }
                    }
                    else {
                        $kode = $huruf."00001";
                    }

                    $destinasi = "/novels";
                    $file = $req->file("files");

                    $name = $file->getClientOriginalName();
                    $file->move(public_path($destinasi),$name);

                    $id = Session::get("login")->id;

                    $data = [
                        "kode" => $kode,
                        "judul"=>$req->nama,
                        "deskripsi"=>$req->desc,
                        "gambar" => $name,
                        "harga" => $req->harga,
                        "pengarang" => $id
                    ];
                    $result = new Novel();
                    $result->insertNovel($data);

                    if ($result) {
                        Session::flash("msg", "Berhasil Tambah Novel!");
                    }
                    else {
                        Session::flash("msg", "Gagal Tambah Novel!");
                    }
                }
            }
            else {
                Session::flash("msg","Tipe Harga Tidak Valid!");
            }
        }
        else {
            Session::flash("msg","Field Tidak Boleh Kosong!");
        }

        return redirect("/addItem");
    }

    public function edit2(Request $req)
    {
        if ($req->nama != "" && $req->desc != "" && $req->harga != "") {
            if (is_numeric($req->harga)) {
                $huruf = strtoupper(substr($req->nama, 0,3));
                $arr = [];
                $data = DB::table('novel')->get("kode");
                if ($data != null) {
                    foreach ($data as $key => $value) {
                        if (preg_match("/$huruf/i", $value->kode)) {
                            $urut = intval(substr($value->kode, 3,5));
                            array_push($arr,$urut);
                        }
                        else {
                            $kode = $huruf."00001";
                        }
                    }
                    if ($arr != null) {
                        $max = max($arr) + 1;
                        if ($max < 10) {
                            $kode = $huruf."0000".$max;
                        }
                        else if ($max > 9) {
                            $kode = $huruf."000".$max;
                        }
                        else if ($max > 99) {
                            $kode = $huruf."00".$max;
                        }
                    }
                }
                else {
                    $kode = $huruf."00001";
                }

                $data = [
                    "id" => $req->id,
                    "judul"=>$req->nama,
                    "deskripsi"=>$req->desc,
                    "kode" => $kode,
                    "harga" => $req->harga
                ];
                $result = new Novel();
                $result->updateNovel($data);

                if ($result) {
                    Session::flash("msg", "Berhasil Edit Novel!");
                }
                else {
                    Session::flash("msg", "Gagal Edit Novel!");
                }
            }
            else {
                Session::flash("msg","Tipe Harga Tidak Valid!");
            }
        }
        else {
            Session::flash("msg","Field Tidak Boleh Kosong!");
        }

        return redirect("/items/{{$req->id}}/edit");
    }

    public function edit(Request $req)
    {
        if ($req->nama != "" && $req->desc != "" && $req->harga != "") {
            if (is_numeric($req->harga)) {
                $huruf = strtoupper(substr($req->nama, 0,3));
                $arr = [];
                $data = DB::table('novel')->get("kode");
                if ($data != null) {
                    foreach ($data as $key => $value) {
                        if (preg_match("/$huruf/i", $value->kode)) {
                            $urut = intval(substr($value->kode, 3,5));
                            array_push($arr,$urut);
                        }
                        else {
                            $kode = $huruf."00001";
                        }
                    }
                    if ($arr != null) {
                        $max = max($arr) + 1;
                        if ($max < 10) {
                            $kode = $huruf."0000".$max;
                        }
                        else if ($max > 9) {
                            $kode = $huruf."000".$max;
                        }
                        else if ($max > 99) {
                            $kode = $huruf."00".$max;
                        }
                    }
                }
                else {
                    $kode = $huruf."00001";
                }

                $data = [
                    "id" => $req->id,
                    "judul"=>$req->nama,
                    "deskripsi"=>$req->desc,
                    "kode" => $kode,
                    "harga" => $req->harga
                ];
                // dd($data);
                $result = new Novel();
                $result->updateNovel($data);

                if ($result) {
                    Session::flash("msg", "Berhasil Edit Novel!");
                }
                else {
                    Session::flash("msg", "Gagal Edit Novel!");
                }
            }
            else {
                Session::flash("msg","Tipe Harga Tidak Valid!");
            }
        }
        else {
            Session::flash("msg","Field Tidak Boleh Kosong!");
        }
        return redirect("/editNovel?idx=$req->id");
    }

    public function editNovel2($id)
    {
        $param["id"] = $id;
        return view("seller.editNovel")->with($param);
    }

    public function detail($id)
    {
        $param["id"] = $id;
        return view("seller.detailNovel")->with($param);
    }

    public function TanyaDelete($id)
    {
        $d = DB::table('novel')->where("novel_id", "=", $id)->get("judul");
        $judul = $d[0]->judul;
        return view("seller.deleteNovel", [
            "id" => $id,
            "nama" => $judul
        ]);
    }

    public function delete(Request $req)
    {
        $result = new Novel();
        $result->deleteNovel($req->id);

        if ($result) {
            Session::flash("msg", "Berhasil Delete Novel!");
        }
        else {
            Session::flash("msg", "Gagal Delete Novel!");
        }
        return redirect("/profil");
    }

    public function search(Request $req)
    {
        $param["cari"] = $req->cari;
        return view("seller.listItem")->with($param);
    }
}
