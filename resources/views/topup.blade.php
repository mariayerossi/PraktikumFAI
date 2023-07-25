@extends('layout.main')
<body style="background-color:darkslateblue">
    @include('layout.header')

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:750px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif
    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container ps-5 pe-5 pt-3 pb-2" style="border-radius:15px;background-color: white; width:580px;height:400px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 8rem auto 8rem auto;">
            <div style="text-align:center">
                <label class="mb-3 mt-3" style="font-size: 30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Top Up Saldo</label><br>
                <img class="mt-2" src="https://cdn-icons-png.flaticon.com/512/438/438526.png" alt="me" style="width:100px;height:100px"><br>
                <form action="/topupSaldo" method="post" class="mt-3">
                    @csrf
                    <input type="text" name="saldo" id="" class="form-control" placeholder="Masukan Nominal Saldo...">
                    <button type="submit" class="btn btn-primary mt-3" style="width: 300px">Top Up</button>
                </form>
                <a href="/">Back</a>
            </div>
        </div>
    </div>
</body>