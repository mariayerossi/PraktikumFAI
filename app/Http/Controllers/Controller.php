<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DTransaksi;
use App\Models\Transaksi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        if (Cookie::has("login")) {
            $db = [];
            $db = json_decode(Cookie::get("login"));//object
            Session::put("login", $db);
        }
        return view("home");
    }

    public function history()
    {
        $param["cari"] = "";
        return view("history")->with($param);
    }

    public function dashboard()
    {
        return view("admin.dashboard");
    }

    public function laporan()
    {
        $param["range"] = "";
        return view("admin.report")->with($param);
    }

    public function listSeller()
    {
        return view("admin.listSeller");
    }

    public function listMember()
    {
        return view("admin.listMember");
    }

    public function member()
    {
        $param["err"] = "";
        return view("member")->with($param);
    }

    public function about()
    {
        return view("about");
    }

    public function login()
    {
        if (Cookie::has("login")) {
            $db = [];
            $db = json_decode(Cookie::get("login"));//object
            Session::put("login", $db);
        }
        // if (Session::has("login")) {
        //     return redirect('/');
        // }
        // return view("login");
        return view("login");
    }

    public function register()
    {
        // if (Session::has("login")) {
        //     return redirect('/');
        // }
        // return view("register");
        return view("register");
    }

    public function cart()
    {
        // if (!Session::has("login")) {
        //     return redirect('/login');
        // }
        return view('cart');
    }

    public function addtocart()
    {
        if (Session::has("login")) {
            $id = Session::get("login")->id;
            $jenis = $_GET["jenis"];
            $qty = $_GET["qty"];
            $total = $_GET["total"];

            $db = [];
            if (Session::has("cart")) $db = Session::get("cart");

            array_push($db,[
                "jenis" => $jenis,
                "durasi" => $qty,
                "total" => $total,
                "pembeli" => $id
            ]);

            Session::put("cart", $db);

            Session::flash("msg", "Berhasil Tambah ke Cart!");
        }
        else {
            Session::flash("msg", "Please login first");
        }
        return redirect("/membership");
    }

    public function deletecart(Request $req)
    {
        $idx = $req->idx;
        
        $db = [];
        if (Session::has("cart")) $db = Session::get("cart");
        Session::forget("cart");
        array_splice($db, $idx, 1);
        Session::put("cart",$db);
        Session::flash("msg", "Berhasil Delete Cart!");
        return redirect("/cart");
    }

    public function checkout(Request $req)
    {
        $saldo = Session::get("login")->saldo;
        $idx = $req->idx;
        $db = [];
        if (Session::has("cart")) $db = Session::get("cart");

        if ($saldo >= $db[$idx]["total"]) {
            $data = [
                "pembeli" => $db[$idx]["pembeli"],
                "total" => $db[$idx]["total"]
            ];
            $result = new Transaksi();
            $result->insertHtrans($data);
    
            $data2 = DB::table("htrans")->get("id")->last();
            $id = $data2->id;
    
            $data3 = [
                "htrans" => intval($id),
                "membership" => $db[$idx]["jenis"],
                "durasi" => $db[$idx]["durasi"],
                "subtotal" => $db[$idx]["total"]
            ];
            $result2 = new DTransaksi();
            $result2->insertDtrans($data3);

            //saldo-----
            $saldo -= $db[$idx]["total"];
            $id2 = Session::get("login")->id;

            $data4 = [
                "id" => $id2,
                "saldo" => $saldo
            ];
            $result3 = new Customer();
            $result3->insertSaldo($data4);

            $data5 = DB::table('user')->where('id','=',$id2)->first();
            Session::put("login", $data5);
            Cookie::queue("login", json_encode($data5));

            //--------

            Session::forget("cart");
            array_splice($db, $idx, 1);
            Session::put("cart",$db);
    
            if ($result2) {

                Session::flash("msg", "Berhasil Checkout!");
            }
            else {
                Session::flash("msg", "Gagal Checkout!");
            }
        }
        else {
            Session::flash("msg", "Saldo tidak cukup!");
        }

        return redirect("/cart");
    }

    public function search(Request $req)
    {
        $param["cari"] = $req->cari;
        return view("history")->with($param);
    }

    public function rangeTanggal(Request $req)
    {
        if ($req->awal != "" && $req->akhir != "") {
            $db = DB::table('htrans')->join('dtrans', 'htrans.id', '=', 'dtrans.htrans_id')->whereBetween('tanggal', [$req->awal, $req->akhir])->get();
            $param["range"] = $db;
            return view("admin.report")->with($param);
        }
        else {
            $param["range"] = "";
            return view("admin.report")->with($param);
        }

        return redirect("/laporan");
    }
}
