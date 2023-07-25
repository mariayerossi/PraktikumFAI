@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.headerAdmin')

    <div class="container mt-5">
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">List Member</label><br>
        
        @if (Session::has('msg'))
        <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:750px; border-radius:10px; margin-top:20px" >
            <h5>
                {{ Session::get('msg'); }}
            </h5>
        </div>
        @endif
        
        <table class="table table-warning table-striped mt-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Profil Member</th>
                    <th>Nama Member</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $data = DB::select("select * from user u where u.id in (select h.pembeli from htrans h)");
                @endphp
                @if ($data != null)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{asset("upload/$item->gambar_profil")}}" alt="me" style="width:70px;height:70px"></td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->gender}}</td>
                            <td>{{$item->telpon}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>{{$item->tanggal_lahir}}</td>
                            <td>
                                <a href='/editMember?idx={{$item->id}}' class="btn btn-primary">Edit</a>
                                <a href='/lockMember?idx={{$item->id}}' class="btn btn-info">Lock</a>
                                <a href='/unlockMember?idx={{$item->id}}' class="btn btn-success">Unlock</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="9">No Members!</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>