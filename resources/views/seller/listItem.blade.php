@extends('layout.main')
<body style="background-color:rgb(163, 195, 227);background-repeat: no-repeat;background-size:cover">
    @include('layout.header')
    <div class="container mt-2">
        <div class="row">
            <div class="col-9">
                <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">List Item</label>
            </div>

        @if (Session::has("login"))
            <div class="col-3">
                <a href="/addItem" class="btn btn-primary mt-3" style="width: 300px">Add Item</a>
            </div>
        </div>
            <div class="row">
                <div class="col-8">
                    <form action="/search" method="post">
                        @csrf
                        <div class="row mt-5">
                            <div class="col-5">
                                <input type="text" name="cari" class="form-control" placeholder="Search Judul Novel...">
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <div class="row mt-5">
                        <div class="col-3">
                            Sorting By :
                        </div>
                        <div class="col-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Harga Novel
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sort" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Judul Novel
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Ascending
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Descending
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-info table-striped mt-3">
                <thead>
                    <tr>
                        <th>Kode Novel</th>
                        <th>Nama Novel</th>
                        <th>Cover Novel</th>
                        <th>Harga Novel</th>
                        <th>Jumlah Terjual</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $id = Session::get("login")->id;
                        if ($cari != "") {
                            $data =DB::table('novel')->where('pengarang','=',$id)->where("judul", "like", '%'.$cari.'%')->get();
                        }
                        else {
                            $data =DB::table('novel')->where('pengarang','=',$id)->get();
                        }
                    @endphp
                    @if ($data != null)
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->kode}}</td>
                                <td>{{$item->judul}}</td>
                                <td><img src="{{asset("novels/$item->gambar")}}" alt="me" style="width:70px;height:90px"></td>
                                <td>{{$item->harga}}</td>
                                <td>{{$item->terjual}}</td>
                                <td><a href='/items/{{$item->novel_id}}/detail' class="btn btn-info">Detail</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="9">No Novels!</td></tr>
                    @endif
                </tbody>
            </table>
        @else
        </div>
            <div style="display:flex;justify-content: center;align-items: center;">
                <div class="container" style="background-color: white; width:90%;border-radius:10px;height:100px;padding:20px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin-top:20px;">
                    <label class="mt-2" style="font-size:30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">You Have To Login First!</label><br>
                </div>
            </div>
        @endif
    </div>
</body>