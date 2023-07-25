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
        <div class="container" style="background-color: white; width:700px;height:800px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 2rem auto 2rem auto;">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:10px;">Edit Profile</label>
            <form action="/editProfil" method="post">
                @csrf
                <div class="row mt-2">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Name</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="nama" placeholder="Type your name" value={{old('nama')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Username</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="username" placeholder="Type your username" value={{old('username')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Phone Number</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="telp" placeholder="Type your phone number" value={{old('telp')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Address</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="alamat" placeholder="Type your address" value={{old('alamat')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Gender</label>
                    </div>
                    <div class="col-5 ms-3">
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
                    <div class="col-2 mt-4">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Date of Birth</label>
                    </div>
                    <div class="col-5">
                        <input type="date" class="form-control mt-4" name="ultah" placeholder="Type your place and date of birth" value={{old('ultah')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Old Password</label>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control mt-4" name="old" placeholder="Type your old password" value={{old('old')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 ps-5" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">New Password</label>
                    </div>
                    <div class="col-5">
                        <input type="password" class="form-control mt-4" name="password" placeholder="Type your new password" value={{old('password')}}>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 ps-4" style="text-align: right">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Confirmation Password</label>
                    </div>
                    <div class="col-5">
                        <input type="password" class="form-control mt-4" name="password_confirmation" placeholder="Type your confirmation password" value={{old('password_confirmation')}}>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" style="width: 600px">Edit</button>
            </form>
            <a href="/profil" class="btn btn-link">Back to Profile</a>
        </div>
    </div>
</body>