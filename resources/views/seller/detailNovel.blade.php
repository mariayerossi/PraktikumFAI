@extends('layout.main')
<body style="background-color:rgb(224, 177, 118)">
    @include('layout.header')

    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container ps-5 pe-5 pt-3 pb-2" style="border-radius:15px;background-color: white; width:580px;height:650px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 2rem auto 2rem auto;">
            @php
                $data = DB::table("novel")->where("novel_id", "=", $id)->get();
                $data2 = DB::table("user")->where("id", "=", $data[0]->pengarang)->get();
            @endphp
            <div style="text-align:center">
                <label class="mb-3" style="font-size: 30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Detail Novel</label><br>
                @php
                    $gbr = $data[0]->gambar;
                @endphp
                <img src="{{asset("novels/$gbr")}}" alt="me" style="width:160px;height:190px">
            </div>
            @if ($data != null)
            <div class="row">
                <div class="col-4">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Code</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$data[0]->kode}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Name</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$data[0]->judul}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Description</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$data[0]->deskripsi}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Price</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Rp {{$data[0]->harga}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Author</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$data2[0]->nama}}</label>
                </div>
            </div>
            @endif
        </div>
    </div>
</body>