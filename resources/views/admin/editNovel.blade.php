@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.headerAdmin')

    

    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container" style="background-color: white; width:550px;height:450px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 5rem auto 5rem auto;">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Edit Novel</label>
            <form action="/editNovel" method="post">
                @csrf
                <input type="hidden" name="id" value={{$idx}}>
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
            <a href="/listNovel" class="btn btn-link">Back to List Novel</a>
        </div>
    </div>
</body>