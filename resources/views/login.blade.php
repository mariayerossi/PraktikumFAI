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
    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container" style="background-color: white; width:500px;height:510px;text-align:center;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 4rem auto 4rem auto;">
            <label style="font-size: 40px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top:60px">LOGIN</label>
            <form action="/login" method="post">
                @csrf
                <div class="row mt-2">
                    <div class="col-4 ps-5">
                        <label class="mt-5" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Username</label>
                    </div>
                    <div class="col-8 pe-5">
                        <input type="text" class="form-control mt-5" name="username" id="username" placeholder="Type your username">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 ps-5">
                        <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Password</label>
                    </div>
                    <div class="col-8 pe-5">
                        <input type="password" class="form-control mt-4" name="pass" id="pass" placeholder="Type your password">
                    </div>
                </div>
                <div class="row mt-4 form-check">
                    <div class="col-2 ms-5">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="remember">
                    </div>
                    <div class="col-6 me-5">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember Me
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3" style="width: 400px">Login</button>
            </form>
            <label class="mt-5" style="font-size: 18px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Belum punya akun?</label>
            <a href="/register" class="btn btn-link">Yuk, Daftar!</a>
        </div>
    </div>
</body>
</html>

@section('script')
<script>
    // function myclick() {
    //     var user= document.getElementById("user").value;
    //     var pass= document.getElementById("pass").value;
    //     if (user != "" && pass != "") {
    //         window.location.href = `/loginAdmin?user=${user}&pass=${pass}`;
    //     }
    //     else {
    //         Swal.fire({
    //         icon: 'error',
    //         title: 'Error',
    //         text: 'Field cannot be empty!'
    //         })
    //     }
    // }
</script>
@endsection