<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .slideshow {
            overflow: hidden;
            height: 400px;
            width: 628px;
            margin: 0 auto;
        }
        .slide-wrapper {
            width: 3000px;
            animation: slide 18s infinite;
        }
        .image-container{
            margin-top: 50px;
            float: left;
            height: 500px;
            width: 728px;
        }
        .image-container:nth-child(1) {
            background-image: url("https://celadonbooks.com/wp-content/uploads/2019/12/bestdebutnovels2019cover.png") ;
            background-repeat: no-repeat;background-size:cover;
        }
        .image-container:nth-child(2) {
            background-image: url("https://cdn.mos.cms.futurecdn.net/ssidKDDDjeXb5vQYj8dUJ3.jpg") ;
            background-repeat: no-repeat;background-size:cover;
        }
        .image-container:nth-child(3) {
            background-image: url("https://www.thedenizen.co.nz/wp-content/uploads/2018/03/books-1.jpg") ;
            background-repeat: no-repeat;background-size:cover;
        }
        .image-container:nth-child(4) {
            background-image: url("http://www.betterreading.com.au/wp-content/uploads/2017/12/25383102_10154960861271712_1848716069_o.jpg") ;
            background-repeat: no-repeat;background-size:cover;
        }
        @keyframes slide {
            20% {margin-left: 0px;}
            30% {margin-left: -728px;}
            50% {margin-left: -728px;}
            60% {margin-left: -1456px;}
            70% {margin-left: -1456px;}
            80% {margin-left: -2184px;}
            90% {margin-left: -2184px;}
        }
    </style>
</head>
<body style="background-image: url('https://wallpapercave.com/wp/wp5032062.jpg');background-repeat: no-repeat;background-size:cover">
    @include('layout.header')

    <div class="container" style="text-align: center; margin-top:50px">
        <div class="row">
            <div class="col-4 mt-5" style="text-align: left">
                <label style="color:black;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:50px">Aurora</label><br>
                <label style="color:black;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:22px">World of Novels</label><br><br><br>
                <label style="color:black;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:30px;">Baca ribuan novel dan tulis novel versimu!</label>
            </div>
            <div class="col-8">
                <!--<img src="https://celadonbooks.com/wp-content/uploads/2019/12/bestdebutnovels2019cover.png" alt="books" style="width:450px;height:300px;">-->
                <div class="slideshow">
                    <div class="slide-wrapper">
                        <div class="image-container"></div>
                        <div class="image-container"></div>
                        <div class="image-container"></div>
                        <div class="image-container"></div>
                        <div class="image-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="color:black;font-size:23px;font-family:Georgia, 'Times New Roman', Times, serif;margin-top:250px; background-color:white; width:100%; padding:80px;text-align:center;">
        <label style="font-weight: bold;">How Aurora Creator Works</label><br><br>
        <div class="row mb-5">
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <label style="font-size:130px">1</label>
                    </div>
                    <div class="col-9" style="text-align: left">
                        <label style="margin-top:70px">Register dan login akun penulis.</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <label style="font-size:130px">2</label>
                    </div>
                    <div class="col-9" style="text-align: left">
                        <label style="margin-top:70px">Buat dan imajinasikan novel versimu.</label>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <label style="font-size:130px">3</label>
                    </div>
                    <div class="col-9" style="text-align: left">
                        <label style="margin-top:70px">Publish dan biarkan orang lain menikmati novelmu!</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="color:rgb(123, 102, 102);background-color:rgb(255, 238, 238); width:100%; padding:80px;padding-bottom:100px;text-align:center">
        <label style="font-weight: bold;font-size:23px;font-family:Georgia, 'Times New Roman', Times, serif;">Yuk mulai membaca di Aurora!</label><br><br>
        <a href="/login" class="btn btn-danger" style="width:300px">Start Reading</a>
    </div>
</body>
</html>