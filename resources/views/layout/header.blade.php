<nav class="navbar navbar-expand-lg navbar-light bg-light ps-3 pe-3">
    <a class="navbar-brand" href="/">
        <label style="font-size: 25px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Aurora</label>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-item nav-link active" href="/membership" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Membership</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link active" href="/cart" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Cart</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link active" href="/history" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">History</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link active" href="/item" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">List Item</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link active" href="/aboutus" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">About Us</a>
            </li>
            
        </ul>
    </div>
    @if (Session::has("login"))
    <ul class="navbar-nav me-4">
        <li class="nav-item active me-5">
            <label class="mt-2" style="font-weight: bold;font-size:17px;font-family:monospace">Saldo Anda : Rp.{{Session::get("login")->saldo}}</label>
        </li>
        <li class="nav-item dropdown">
            {{-- <label style="font-size: 25px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, Cochin, Georgia, Times, 'Times New Roman', serif">Hi, {{ucfirst($nama)}}</label> --}}
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:black">
                @php
                    $gbr = Session::get("login")->gambar_profil;
                @endphp
                @if ($gbr != "")
                    Hi, {{ucfirst(Session::get("login")->nama)}} <img src="{{asset("upload/$gbr")}}" alt="me" style="width:30px;height:30px">
                @else
                    @if (Session::get("login")->gender == "Male")
                        Hi, {{ucfirst(Session::get("login")->nama)}} <img src="https://cdn-icons-png.flaticon.com/512/1154/1154473.png" alt="me" style="width:30px;height:30px">
                    @else
                    Hi, {{ucfirst(Session::get("login")->nama)}} <img src="https://cdn-icons-png.flaticon.com/512/1154/1154448.png" alt="me" style="width:30px;height:30px">
                    @endif
                @endif
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/profil">Profile</a></li>
                <li><a class="dropdown-item" href="/topup">Top Up Saldo</a></li>
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
    @else
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-item nav-link active" href="/login" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-item nav-link active" href="/register" style="font-weight: bold;font-size:17px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Register</a>
            </li>
        </ul>
    @endif
</nav>