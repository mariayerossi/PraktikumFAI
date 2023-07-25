@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.header')

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:750px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif

    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container" style="background-color: white; width:550px;height:450px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 5rem auto 5rem auto;">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Edit Novel</label>
            <form action="/editNovel2" method="post">
                @csrf
                <input type="hidden" name="id" value={{$id}}>
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nama Novel</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="nama" placeholder="Type novel name" value={{old('nama')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Deskripsi Novel</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="desc" placeholder="Type novel description" value={{old('desc')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Harga Novel</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="harga" placeholder="Type novel price" value={{old('harga')}}>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5" style="width: 430px">Edit</button>
            </form>
            <a href="/profil" class="btn btn-link">Back</a>
        </div>
    </div>
</body>