<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Rules\CekOldPassword;
use App\Rules\CekPassword;
use App\Rules\CustomeRule;
use App\Rules\UsernameTerdaftar;
use App\Rules\UsernameUnik;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginUser extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function profil()
    {
        return view("profil");
    }
    public function editProfil()
    {
        return view("editProfil");
    }
    public function topup()
    {
        return view("topup");
    }
    public function editMember(Request $req)
    {
        $param["idx"] = $req->idx;
        return view("admin.editMember")->with($param);
    }
    public function gantiProfil() {
        return view("gantiProfil");
    }

    public function registerUser(Request $req)
    {
        if ($req->nama != "" && $req->username != "" && $req->telp != "" && $req->alamat != "" && $req->ultah != "" && $req->password != "" && $req->password_confirmation != "") {
            if ($req->password_confirmation == $req->password) {
                if (is_numeric($req->telp)) {
                    if (strlen($req->telp) >= 10) {
                        $potong = explode("-", strval($req->ultah));
                        if (2022 - $potong[0] >= 17) {
                            $cust = new Customer();
                            $data = DB::table('user')->where('username','=',$req->username)->first();
                            if ($data == null) {
                                if ($req->rbGender == "Female") {
                                    $gbr = "female.png";
                                }
                                else {
                                    $gbr = "male.png";
                                }
                                $data = [
                                    "nama"=>$req->nama,
                                    "username"=>$req->username,
                                    "password" => $req->password,
                                    "gambar" => $gbr,
                                    "telpon" => $req->telp,
                                    "alamat" => $req->alamat,
                                    "gender" => $req->rbGender,
                                    "tanggal_lahir" => $req->ultah
                                ];
                                $result = new Customer();
                                $result->insertCustomer($data);
        
                                if ($result) {
                                    Session::flash("msg", "Berhasil Tambah User!");
                                }
                                else {
                                    Session::flash("msg", "Gagal Tambah User!");
                                }
                            }
                            else {
                                Session::flash("msg", "Username sudah ada!");
                            }
                        }
                        else {
                            Session::flash("msg","User minimal umur 17 tahun!");
                        }
                    }
                    else {
                        Session::flash("msg","Nomor Telepon minimal 10!");
                    }
                }
                else {
                    Session::flash("msg","Nomor Telepon tidak valid!");
                }
            }
            else {
                Session::flash("msg","Confirmation Password salah!");
            }
        }
        else {
            Session::flash("msg","Field tidak boleh kosong!");
        }
        return redirect("/register");
    }

    public function loginUser(Request $req)
    {
        if ($req->username != "" && $req->pass != "") {
            if ($req->username == "master" && $req->pass == "master") {
                Session::put("admin", "admin");
                return redirect("/dashboard");
            }
            else {
                $data = DB::table('user')->where('username','=',$req->username)->where('password','=',$req->pass)->first();
                if ($data != null) {
                    if ($data->locked == "false") {
                        if ($req->remember != null) {
                            Cookie::queue("login", json_encode($data));
                        }
                        // dd($data);
                        Session::put("login", $data);
                        // dd(Session::get("login"));
    
                        Cookie::queue("login", json_encode($data));
    
                        return redirect("/");
                    }
                    else {
                        Session::flash("msg","Gagal Login, akun terkunci!");
                    }
                }
                else {
                    Session::flash("msg","Akun tidak ada, Silahkan daftar dulu!");
                }
            }
        }
        else {
            Session::flash("msg","Field tidak boleh kosong!");
        }
        return redirect("/login");
    }

    public function logoutUser(Request $req)
    {
        if (Session::has("login")) {
            $forget = Cookie::forget("login");
            Cookie::queue($forget);
            Session::forget('login');
        }
        else if (Session::has("admin")) {
            Session::forget('admin');
        }
        return redirect("/login");
    }

    public function edit(Request $req)
    {
        if ($req->nama != "" && $req->username != "" && $req->telp != "" && $req->alamat != "" && $req->ultah != "" && $req->password != "" && $req->password_confirmation != "" && $req->old != "") {
            $pass = Session::get("login")->password;
            $id = Session::get("login")->id;
            if ($req->old == $pass) {
                if ($req->password_confirmation == $req->password) {
                    if (is_numeric($req->telp)) {
                        if (strlen($req->telp) >= 10) {
                            $potong = explode("-", strval($req->ultah));
                            if (2022 - $potong[0] >= 17) {
                                $data3 = DB::table('user')->where('username','=',$req->username)->first();
                                if ($data3 == null) {
                                    $data4 = DB::table('user')->where('id','=',$id)->first();
                                    if ($data4->gambar_profil == "male.png" || $data4->gambar_profil == "female.png") {
                                        if ($req->rbGender == "Female") {
                                            $gbr = "female.png";
                                        }
                                        else {
                                            $gbr = "male.png";
                                        }
                                    }
                                    else {
                                        $gbr = $data4->gambar_profil;
                                    }
                                    $data = [
                                        "id" => $id,
                                        "nama"=>$req->nama,
                                        "username"=>$req->username,
                                        "password" => $req->password,
                                        "gambar" => $gbr,
                                        "telpon" => $req->telp,
                                        "alamat" => $req->alamat,
                                        "gender" => $req->rbGender,
                                        "tanggal_lahir" => $req->ultah
                                    ];
                                    $result = new Customer();
                                    $result->updateCustomer($data);

                                    $data2 = DB::table('user')->where('username','=',$req->username)->where('password','=',$req->password)->first();
                                    if ($data2 != null) {
                                        Session::put("login", $data2);
                                    }
            
                                    if ($result) {
                                        Session::flash("msg", "Berhasil Edit User!");
                                    }
                                    else {
                                        Session::flash("msg", "Gagal Edit User!");
                                    }
                                }
                                else {
                                    Session::flash("msg","Username sudah ada!");
                                }
                            }
                            else {
                                Session::flash("msg","User minimal umur 17 tahun!");
                            }
                        }
                        else {
                            Session::flash("msg","Nomor Telepon minimal 10!");
                        }
                    }
                    else {
                        Session::flash("msg","Nomor Telepon tidak valid!");
                    }
                }
                else {
                    Session::flash("msg","Confirmation Password salah!");
                }
            }
            else {
                Session::flash("msg","Old password salah!");
            }
        }
        else {
            Session::flash("msg","Field tidak boleh kosong!");
        }
        return redirect("/editProfil");
    }

    public function editMbr(Request $req)
    {
        if ($req->nama != "" && $req->telp != "" && $req->alamat != "") {
            if (is_numeric($req->telp)) {
                if (strlen($req->telp) >= 10) {
                    $data3 = DB::table('user')->where('id','=',$req->id)->first();
                    if ($data3->gambar_profil == "male.png" || $data3->gambar_profil == "female.png") {
                        if ($req->rbGender == "Female") {
                            $gbr = "female.png";
                        }
                        else {
                            $gbr = "male.png";
                        }
                    }
                    else {
                        $gbr = $data3->gambar_profil;
                    }
                    $data = [
                        "id" => $req->id,
                        "nama"=>$req->nama,
                        "telpon" => $req->telp,
                        "alamat" => $req->alamat,
                        "gender" => $req->rbGender,
                        "gambar" => $gbr
                    ];
                    $result = new Customer();
                    $result->updateMember($data);

                    if ($result) {
                        Session::flash("msg", "Berhasil Edit Member!");
                    }
                    else {
                        Session::flash("msg", "Gagal Edit Member!");
                    }
                }
                else {
                    Session::flash("msg","Nomor Telepon minimal 10!");
                }
            }
            else {
                Session::flash("msg","Nomor Telepon tidak valid!");
            }
        }
        else {
            Session::flash("msg","Field tidak boleh kosong!");
        }

        return redirect("/editMember?idx=$req->id");
    }

    public function topupSaldo(Request $req) {
        if ($req->saldo != "") {
            if (is_numeric($req->saldo)) {
                if (intval($req->saldo) > 0) {
                    $id = Session::get("login")->id;
                    
                    Session::forget('login');
                    $forget = Cookie::forget("login");
                    Cookie::queue($forget);

                    $data2 = DB::table('user')->where('id','=',$id)->first();
                    $saldo = intval($data2->saldo) + intval($req->saldo);
                    
                    $data = [
                        "id" => $id,
                        "saldo" => $saldo
                    ];
                    $result = new Customer();
                    $result->insertSaldo($data);

                    $data3 = DB::table('user')->where('id','=',$id)->first();
                    Session::put("login", $data3);
                    Cookie::queue("login", json_encode($data3));

                    if ($result) {
                        Session::flash("msg", "Berhasil Top Up Saldo!");
                    }
                    else {
                        Session::flash("msg", "Gagal Top Up Saldo!");
                    }
                }
                else {
                    Session::flash("msg","Saldo tidak boleh kurang dari 1!");
                }
            }
            else {
                Session::flash("msg","Saldo tidak valid!");
            }
        }
        else {
            Session::flash("msg","Field tidak boleh kosong!");
        }

        return redirect("/topup");
    }

    public function ganti(Request $req) {
        if ($req->file("files") != null) {
            $file = $req->file("files");
            if ($file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "png" || $file->getClientOriginalExtension() == "gif") {
                $destinasi = "/upload";
                $file = $req->file("files");

                $name = $file->getClientOriginalName();
                $file->move(public_path($destinasi),$name);
                
                $id = Session::get("login")->id;
                $data = [
                    "id" => $id,
                    "gambar" => $name
                ];
                $result = new Customer();
                $result->updateFoto($data);

                $data2 = DB::table('user')->where('id','=',$id)->first();
                if ($data2 != null) {
                    Session::put("login", $data2);
                }

                if ($result) {
                    Session::flash("msg", "Berhasil Edit Foto User!");
                }
                else {
                    Session::flash("msg", "Gagal Edit Foto User!");
                }
            }
            else {
                Session::flash("msg", "Tipe Foto harus jpeg / jpg / png / gif!");
            }
        }
        else {
            Session::flash("msg","Field tidak boleh kosong!");
        }
        return redirect("/gantiProfil");
    }

    public function lockMember(Request $req) {
        $data = DB::table("user")->where("id", "=", $req->idx)->get("locked");
        $status = $data[0]->locked;
        if ($status == "false") {
            $data2 = [
                "id" => $req->idx,
                "lock" => "true"
            ];
            $result = new Customer();
            $result->updateLock($data2);

            if ($result) {
                Session::flash("msg", "Berhasil Lock Akun!");
            }
            else {
                Session::flash("msg", "Gagal Lock Akun!");
            }
        }
        else {
            Session::flash("msg", "Akun sudah dilock!");
        }
        return redirect("/listMember");
    }

    public function unlockMember(Request $req) {
        $data = DB::table("user")->where("id", "=", $req->idx)->get("locked");
        $status = $data[0]->locked;
        if ($status == "true") {
            $data2 = [
                "id" => $req->idx,
                "lock" => "false"
            ];
            $result = new Customer();
            $result->updateLock($data2);

            if ($result) {
                Session::flash("msg", "Berhasil Unlock Akun!");
            }
            else {
                Session::flash("msg", "Gagal Unlock Akun!");
            }
        }
        else {
            Session::flash("msg", "Akun sudah diunlock!");
        }
        return redirect("/listMember");
    }
}
