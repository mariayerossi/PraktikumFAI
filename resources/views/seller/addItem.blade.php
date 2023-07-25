@extends('layout.main')
<body style="background-color:rgb(163, 195, 227);background-repeat: no-repeat;background-size:cover">
    @include('layout.header')

    <div class="container mt-2">
        <div class="row">
            <div class="col-9">
                <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">Add Item</label>
            </div>
            <div class="col-3">
                <a href="/item" class="btn btn-primary mt-3" style="width: 300px">Back to List Item</a>
            </div>
        </div>

        @if (Session::has('msg'))
        <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:750px; border-radius:10px; margin-top:20px" >
            <h5>
                {{ Session::get('msg'); }}
            </h5>
        </div>
        @endif

        <form action="/addItem" method="post" class="ms-5" enctype="multipart/form-data">
            @csrf
            <div class="row mt-5">
                <div class="col-2">
                    <label style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nama Novel :</label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Type novel name" value={{old("nama")}}>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <label style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Deskripsi Novel :</label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Type novel description" value={{old("desc")}}>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <label style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Cover Novel :</label>
                </div>
                <div class="col-4">
                    <input type="file" name="files" id="" class="form-control">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <label style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Harga Novel :</label>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Type novel Price" value={{old("harga")}}>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-5" style="width: 640px">Add</button>
        </form>
    </div>
</body>