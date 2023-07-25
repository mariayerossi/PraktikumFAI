@extends('layout.main')
<body style="background-color:lightblue;background-repeat: no-repeat;background-size:cover">
    @include('layout.header')

    @if (Session::has('msg'))
    <div class="container" style="text-align: center;background-color:aliceblue; padding: 20px; color: black; width:1000px; border-radius:10px; margin-top:20px" >
        <h5>
            {{ Session::get('msg'); }}
        </h5>
    </div>
    @endif
    <div class="container mt-5" style="text-align: center">
        {{-- @include("message") --}}
        @if ($err != "")
            <div class="p-3" style="width:100%;background-color:rgb(121, 145, 187);border-radius:10px;font-size:20px;color:white">{{$err}}</div><br><br>
        @endif
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:50px">Membership</label>
        <div class="row mt-5" style="margin-left:90px">
            <div class="col-4">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h3>SILVER</h3></div>
                    <div class="card-body">
                        <h5 class="card-title">Rp 300.000</h5>
                        <p class="card-text">Dapat membaca semua novel VIP mulai dari novel dengan bintang 1 hingga novel terfavorit yang memiliki bintang 3</p>
                        <button type="button" class="btn btn-info" onclick="myclick('silver','300000')">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h3>GOLD</h3></div>
                        <div class="card-body">
                        <h5 class="card-title">Rp 400.000</h5>
                        <p class="card-text">Dapat membaca semua novel VIP mulai dari novel dengan bintang 1 hingga novel terfavorit yang memiliki bintang 4</p>
                        <button type="button" class="btn btn-info" onclick="myclick('gold','400000')">Add to Cart</button>
                    </div> 
                </div>                 
            </div>
            <div class="col-4">
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header"><h3>PLATINUM</h3></div>
                    <div class="card-body">
                        <h5 class="card-title">Rp 500.000</h5>
                        <p class="card-text">Dapat membaca semua novel VIP mulai dari novel dengan bintang 1 hingga novel terfavorit yang memiliki bintang 5</p>
                        <button type="button" class="btn btn-info" onclick="myclick('platinum','500000')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="color:black;font-size:23px;font-family:Georgia, 'Times New Roman', Times, serif;margin-top:200px; background-color:white; width:100%; padding:80px;text-align:center;">
        <label style="font-weight: bold;">How Membership Works</label><br><br>
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <label style="font-size:130px">1</label>
                    </div>
                    <div class="col-9" style="text-align: left">
                        <label style="margin-top:70px">Register dan login akun pembaca.</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <label style="font-size:130px">2</label>
                    </div>
                    <div class="col-9" style="text-align: left">
                        <label style="margin-top:70px">Daftar membership Aurora dan isi kelengkapan membership.</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <label style="font-size:130px">3</label>
                    </div>
                    <div class="col-9" style="text-align: left">
                        <label style="margin-top:70px">nikmati novel-novel VIP yang seru!</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@section('script')
<script>
    function myclick(jenis, harga) {
        
        Swal.fire({
        html:
            `how long have you rented a ${jenis} membership? (Month)`+
            '<input id="isi" type="number" class="form-control" placeholder="Type in here...">',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Add in Cart!'
        }).then((result) => {
        if (result.isConfirmed) {
            if (document.getElementById('isi').value != "") {
                if (parseInt(document.getElementById('isi').value) > 0) {
                    var qty= document.getElementById("isi").value;
                    var total = parseInt(document.getElementById('isi').value) * parseInt(harga);
                    Swal.fire(
                    `You want to buy a ${jenis} membership for ` + document.getElementById('isi').value + ' months?',
                    'Total Payment : Rp ' + parseInt(document.getElementById('isi').value) * parseInt(harga),
                    ).then((rslt) => {
                    if (rslt.isConfirmed) {

                        window.location.href = `/addToCart?jenis=${jenis}&qty=${qty}&total=${total}`;
                    }
                    })
                }
                else{
                Swal.fire(
                    'Failed to Add Cart!',
                    'Inaccurate Input',
                    'error'
                )
            }
            }
            else{
                Swal.fire(
                    'Failed to Add Cart!',
                    'Field cannot be empty',
                    'error'
                )
            }
        }
        })
    }
</script>
@endsection