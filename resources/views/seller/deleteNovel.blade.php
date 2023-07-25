@extends('layout.main')
<body style="background-color:cadetblue">
    <div style="display:flex;justify-content: center;align-items: center;">
        <div class="container ps-5 pe-5 pt-3 pb-2" style="border-radius:15px;background-color: white; width:580px;height:400px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 10rem auto 10rem auto;">
            <div style="text-align:center">
                <img class="mt-2" src="https://img.icons8.com/bubbles/2x/000000/delete-forever.png" alt="me" style="width:140px;height:140px"><br>
                <label class="mb-3 mt-3" style="font-size: 30px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Do you want to delete {{ucfirst($nama)}}'s novels?</label>
                <form action="/deleteNovel" method="post" class="mt-4">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <a href="/profil" class="btn btn-primary">No, Cancel</a>
                    <button type="submit" class="btn btn-danger">Yes, Delete!</button>
                </form>
            </div>
        </div>
    </div>
</body>