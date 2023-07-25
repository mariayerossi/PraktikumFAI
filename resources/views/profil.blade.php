@extends('layout.main')
<body style="background-color:bisque">
    @include('layout.header')

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:750px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif
    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container ps-5 pe-5 pt-3 pb-2" style="border-radius:15px;background-color: white; width:580px;height:660px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 2rem auto 2rem auto;">
            <div style="text-align:center">
                <label class="mb-3" style="font-size: 30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">My Profile</label><br>
                @php
                    $gbr = Session::get("login")->gambar_profil;
                @endphp
                <img src="{{asset("upload/$gbr")}}" alt="me" style="width:140px;height:140px">
            </div>
            <div style="text-align:center" class="mt-3">
                <a href="/gantiProfil">Change Profile Picture</a>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Name</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{Session::get("login")->nama}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Username</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{Session::get("login")->username}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Phone Number</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{Session::get("login")->telpon}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Address</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{Session::get("login")->alamat}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Gender</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{Session::get("login")->gender}}</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Date of Birth</label>
                </div>
                <div class="col-1" style="text-align: right">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
                </div>
                <div class="col-5">
                    <label class="mt-2" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{Session::get("login")->tanggal_lahir}}</label>
                </div>
            </div>
            <a href="/editProfil" class="btn btn-info mt-5" style="width: 500px">Edit Profile</a>
        </div>
    </div>
    <div class="container">
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">List Novel Seller</label><br>
        <table class="table table-info table-striped mt-5">
            <thead>
                <tr>
                    <th>Kode Novel</th>
                    <th>Nama Novel</th>
                    <th>Cover Novel</th>
                    <th>Harga Novel</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $data = DB::table('novel')->get();
                @endphp
                @if ($data != null)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item->kode}}</td>
                            <td>{{$item->judul}}</td>
                            <td><img src="{{asset("novels/$item->gambar")}}" alt="me" style="width:70px;height:90px"></td>
                            <td>{{$item->harga}}</td>
                            <td>
                                <a href='/items/{{$item->novel_id}}/edit' class="btn btn-primary">Edit</a>
                                <a href='/items/{{$item->novel_id}}/delete' class="btn btn-danger">Delete</a>
                                <a href='/items/{{$item->novel_id}}/detail' class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="10">No Novels!</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</body>