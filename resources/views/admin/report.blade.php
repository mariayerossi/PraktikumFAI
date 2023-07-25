@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.headerAdmin')
    <div class="container mt-4">
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">Laporan Penjualan</label><br>

        @if (Session::has('msg'))
        <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:900px; border-radius:10px; margin-top:20px" >
            <h5>
                {{ Session::get('msg'); }}
            </h5>
        </div>
        @endif
        <form action="/rangeTanggal" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:25px" class="mt-5">Range Tanggal :</label><br>
                    <div class="row">
                        <div class="col-5">
                            <input class="form-control" type="date" name="awal" id="">
                        </div>
                        <div class="col-2" style="text-align: center">
                            <label style="font-size: 20px"><b>-</b></label>
                        </div>
                        <div class="col-5">
                            <input class="form-control" type="date" name="akhir" id="">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:25px" class="mt-5">Format Report :</label><br>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rbFormat" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  per hari
                                </label>
                              </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rbFormat" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  per bulan
                                </label>
                              </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rbFormat" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  per tahun
                                </label>
                              </div>
                        </div> 
                        <div class="col-3">
                            <button class="btn btn-success" type="submit">Tampilkan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @php
            if ($range != "") {
                $data = $range;
            }
            else {
                $data = DB::table('htrans')->join('dtrans', 'htrans.id', '=', 'dtrans.htrans_id')->get();
            }
            $total = 0;
        @endphp
        <table class="table table-warning table-striped mt-3">
            <thead>
                <tr>
                    <th>Nomer</th>
                    <th>Jenis Membership</th>
                    <th>Penjual</th>
                    <th>Durasi Sewa</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @if ($data != null)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->membership}}</td>
                            @if ($item->membership == "Silver")
                                <td>Mia Wijaya</td>
                            @elseif ($item->membership == "Gold")
                                <td>Hendra Budianto</td>
                            @else
                                <td>Andika Putra</td>
                            @endif
                            <td>{{$item->durasi}} bulan</td>
                            <td>Rp. {{$item->total}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="4">No Transactions!</td></tr>
                @endif
            </tbody>
        </table>
        <label class="mt-5" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:25px">Total Pendapatan :</label>
            @if ($data != null)
                @foreach ($data as $item)
                    @php $total += intval($item->total) @endphp
                @endforeach
                <label class="mt-1 ms-2" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:25px">Rp. {{$total}}</label><br>
            @else
                <label class="mt-1 ms-2" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:25px">Rp. 0</label><br>
            @endif
    </div>
</body>