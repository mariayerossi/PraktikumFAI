@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.headerAdmin')
    <div class="container mt-5">
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">Welcome, Admin!</label><br>
        <label class="mt-5" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:28px">Total Pendapatan :</label><br>

        @php
            $total = 0;
            $data = DB::table('htrans')->get("total");
        @endphp
        @if ($data != null)
            @foreach ($data as $item)
                @php $total += intval($item->total) @endphp
            @endforeach
            <label class="mt-1 ms-5" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:28px">Rp. {{$total}}</label><br>
        @else
            <label class="mt-1 ms-5" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:28px">Rp. 0</label><br>
        @endif
        
        <label class="mt-5" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:23px">Rincian Pendapatan :</label><br>
        <table class="table table-primary table-striped mt-2">
            <thead>
                <tr>
                    <th>Nomer</th>
                    <th>Jenis Membership</th>
                    <th>Durasi Sewa</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $data = DB::table('htrans')->join('dtrans', 'htrans.id', '=', 'dtrans.htrans_id')->get();
                @endphp
                @if ($data != null)
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucfirst($item->membership)}}</td>
                            <td>{{$item->durasi}} bulan</td>
                            <td>Rp. {{$item->total}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="4">No Transactions!</td></tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>