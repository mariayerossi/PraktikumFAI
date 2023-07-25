@extends('layout.main')
<body style="background-image: url('https://static.vecteezy.com/system/resources/previews/000/406/484/original/vector-background-wallpaper-with-polygons-in-gradient-colors.jpg');background-repeat: no-repeat;background-size:cover">
    @include('layout.header')

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:750px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif
    <div style="display:flex;justify-content: center;align-items: center;border-radius:10px">
        <div class="container" style="background-color: white; width:750px;height:750px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 2rem auto 2rem auto;">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Registration</label>
            <form action="/register" method="post">
                @csrf
                <div class="row mt-2">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Name</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control mt-4" name="nama" placeholder="Type your name" value={{old('nama')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Username</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control mt-4" name="username" placeholder="Type your username" value={{old('username')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Phone Number</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control mt-4" name="telp" placeholder="Type your phone number" value={{old('telp')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Address</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control mt-4" name="alamat" placeholder="Type your address" value={{old('alamat')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Gender</label>
                    </div>
                    <div class="col-6 ms-3">
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
                </div>
                <div class="row">
                    <div class="col-4" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Date of Birth</label>
                    </div>
                    <div class="col-6">
                        <input type="date" class="form-control mt-4" name="ultah" value={{old('ultah')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Password</label>
                    </div>
                    <div class="col-6">
                        <input type="password" class="form-control mt-4" name="password" placeholder="Type your password" value={{old('password')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-4" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Confirmation Password</label>
                    </div>
                    <div class="col-6">
                        <input type="password" class="form-control mt-4" name="password_confirmation" placeholder="Type your confirmation password" value={{old('password_confirmation')}}>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" style="width: 650px">Sign Up</button>
            </form>
            <label class="mt-3" style="font-size: 18px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Sudah punya akun?</label>
            <a href="/login" class="btn btn-link">Yuk, Login!</a>  
        </div>
    </div>
</body>