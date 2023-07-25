@extends('layout.main')
<body style="background-image: url('https://images8.alphacoders.com/943/943753.png');background-repeat: no-repeat;background-size:cover">
    @include('layout.headerAdmin')
    <div class="container mt-5">
        <label style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:40px">List Seller / Author</label><br>
        <div class="row mt-4">
            <div class="col-2">
                <label style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Nama Pengarang :</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Type Author Name...">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-2">
                <label style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Asal Kota Pengarang :</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Type Author City...">
            </div>
        </div>
        <button type="button" class="btn btn-primary mt-4 ms-5" style="width: 500px">Add</button>
        <table class="table table-warning table-striped mt-5">
            <thead>
                <tr>
                    <th>Nomer</th>
                    <th>Nama Pengarang</th>
                    <th>Asal Kota</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Anita Wijaya</td>
                    <td>Jakarta</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Andika Lianto</td>
                    <td>Surabaya</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Siska Amalia</td>
                    <td>Bandung</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>