@extends('layout.main')
<body style="background-image:url('https://www.xtrafondos.com/wallpapers/degradado-difuminado-verde-7936.jpg');background-repeat: no-repeat;background-size:cover">
    @include('layout.header')
    <div class="container mt-2">
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">List Cart</label>
    </div>

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:1000px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif

    @if (Session::has("login"))
        @if (Session::has("cart"))
            @php
                $id = Session::get("login")->id;
            @endphp
            @foreach (Session::get("cart") as $item)
                @if ($id == $item["pembeli"])
                    <div style="display:flex;justify-content: center;align-items: center;">
                        <div class="container" style="background-color: white; width:90%;border-radius:10px;height:100px;padding:20px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin-top:20px; padding-right:30px">
                            <div class="row">
                                <div class="col-7">
                                    <label style="font-size:25px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">{{strtoupper($item["jenis"])}}</label><br>
                                    <label style="font-size:15px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">{{$item["durasi"]}} Months</label>
                                </div>
                                <div class="col-3 mt-2">
                                    <label class="ms-5" style="font-size:25px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Total : Rp {{$item["total"]}}</label>
                                </div>
                                <div class="col-1 mt-2">
                                    <a href='/deleteCart?idx={{$loop->iteration-1}}' class="btn btn-danger">Delete</a>
                                </div>
                                <div class="col-1 mt-2">
                                    <a href='/checkout?idx={{$loop->iteration-1}}' class="btn btn-primary">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div style="display:flex;justify-content: center;align-items: center;">
                <div class="container" style="background-color: white; width:90%;border-radius:10px;height:100px;padding:20px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin-top:20px;">
                    <label class="mt-2" style="font-size:30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">No Item</label><br>
                </div>
            </div>
        @endif
    @else
        <div style="display:flex;justify-content: center;align-items: center;">
            <div class="container" style="background-color: white; width:90%;border-radius:10px;height:100px;padding:20px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin-top:20px;">
                <label class="mt-2" style="font-size:30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Please Login First</label><br>
            </div>
        </div>
    @endif
</body>
</html>