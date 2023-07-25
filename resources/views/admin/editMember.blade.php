@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.headerAdmin')

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:600px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif
    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container" style="background-color: white; width:550px;height:470px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 5rem auto 5rem auto;">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Edit Member</label>
            <form action="/editMember" method="post">
                @csrf
                <input type="hidden" name="id" value={{$idx}}>
                <div class="row mt-2">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Name</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control mt-4" name="nama" placeholder="Type member name" value={{old('nama')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Phone Number</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control mt-4" name="telp" placeholder="Type member phone number" value={{old('telp')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Address</label>
                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control mt-4" name="alamat" placeholder="Type member address" value={{old('alamat')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Gender</label>
                    </div>
                    <div class="col-7 ms-3">
                        <div class="row">
                            <div class="col-4 form-check mt-4">
                                <input class="form-check-input" type="radio" name="rbGender" id="flexRadioDefault1" checked value="Male">
                                <label class="form-check-label" for="flexRadioDefault1">
                                Male
                                </label>
                            </div>
                            <div class="col-4 form-check mt-4">
                                <input class="form-check-input" type="radio" name="rbGender" id="flexRadioDefault2" value="Female">
                                <label class="form-check-label" for="flexRadioDefault2">
                                Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 mt-4">
                        
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" style="width: 450px">Edit</button>
            </form>
            <a href="/listMember" class="btn btn-link">Back to List Member</a>
        </div>
    </div>
</body>