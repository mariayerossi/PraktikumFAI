@extends('layout.main')
<body style="background-color:rgb(255, 222, 194);background-repeat: no-repeat;background-size:cover">
    @include('layout.header')
    <div class="container mt-2">
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">History</label>
    </div>

    @if (Session::has("login"))
        <div class="container">
            <form action="/searchHistory" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-5">
                        <input type="text" name="cari" class="form-control" placeholder="Search History...">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>
        @php
            $id = Session::get("login")->id;
            if ($cari != "") {
                $data = DB::table('htrans')->join('dtrans', 'htrans.id', '=', 'dtrans.htrans_id')->where("pembeli","=",$id)->where("htrans.id", "=", $cari)->get();
            }
            else {
                $data = DB::table('htrans')->join('dtrans', 'htrans.id', '=', 'dtrans.htrans_id')->where("pembeli","=",$id)->get();
            }
        @endphp
        @if ($data != null)
            @foreach ($data as $item)
                <div style="display:flex;justify-content: center;align-items: center;">
                    <div class="container" style="background-color: white; width:90%;border-radius:10px;height:100px;padding:20px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin-top:20px; padding-right:30px">
                        <div class="row">
                            <div class="col-9">
                                <label style="font-size:25px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">{{strtoupper($item->membership)}}</label><br>
                                <label style="font-size:15px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">{{$item->durasi}} Months</label>
                            </div>
                            <div class="col-3">
                                <label class="me-5 mt-2" style="font-size:25px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Total : Rp {{$item->subtotal}}</label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div style="display:flex;justify-content: center;align-items: center;">
                <div class="container" style="background-color: white; width:90%;border-radius:10px;height:100px;padding:20px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin-top:20px;">
                    <label class="mt-2" style="font-size:30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">No History</label><br>
                </div>
            </div>
        @endif
    @else
    @php
        
    @endphp
        <div style="display:flex;justify-content: center;align-items: center;">
            <div class="container" style="background-color: white; width:90%;border-radius:10px;height:100px;padding:20px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin-top:20px;">
                <label class="mt-2" style="font-size:30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Please Login First</label><br>
            </div>
        </div>
    @endif
</body>
</html>