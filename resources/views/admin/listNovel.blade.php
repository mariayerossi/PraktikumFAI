@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.headerAdmin')
    <div class="container mt-2">
        <div class="row">
            <div class="col-9">
                <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">List Novel</label>
            </div>

            <table class="table table-primary table-striped mt-5">
                <thead>
                    <tr>
                        <th>Kode Novel</th>
                        <th>Nama Novel</th>
                        <th>Cover Novel</th>
                        <th>Deskripsi Novel</th>
                        <th>Harga Novel</th>
                        <th>Jumlah Terjual</th>
                        <th>Nama Pengarang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $data = DB::table('novel')->join("user",'novel.pengarang', '=', 'user.id')->get();
                    @endphp
                    @if ($data != null)
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$item->kode}}</td>
                                <td>{{$item->judul}}</td>
                                <td><img src="{{asset("novels/$item->gambar")}}" alt="me" style="width:70px;height:90px"></td>
                                <td>{{$item->deskripsi}}</td>
                                <td>{{$item->harga}}</td>
                                <td>{{$item->terjual}}</td>
                                <td>{{$item->nama}}</td>
                                <td><a href='/editNovel?idx={{$item->novel_id}}' class="btn btn-primary">Edit</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="9">No Novels!</td></tr>
                    @endif
                </tbody>
            </table>
    </div>
</body>