@extends('layout.main')
<body style="background-color:bisque">
    @include('layout.header')

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:750px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif
    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container" style="border-radius:15px;background-color: white; width:600px;height:400px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 8rem auto 8rem auto;padding:30px">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Choose Your Profile Picture</label>
            <form action="/ganti" method="post" enctype="multipart/form-data" class="mt-5">
                @csrf
                <input type="file" class="form-control" name="files" id="">
                <button type="submit" class="btn btn-primary" style="margin-top:90px;width: 500px">Change</button>
            </form>
            <a href="/profil">Back to Profile</a>
        </div>
    </div>
</body>