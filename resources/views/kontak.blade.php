@extends('layouts.front-app')
@section('content')
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
        <div class="row align-items-end justify-content-center text-center">
            <div class="col-lg-7">
                <h2 class="mb-0">{{$title}}</h2>
                <p>Hubungi Kami!</p>
            </div>
        </div>
    </div>
</div>


<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{url('/')}}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">{{$title}}</span>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <form action="{{url('kontak')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="fname">Nama</label>
                <input type="text" name="nama" id="fname" class="form-control form-control-lg">
                @error('nama')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="eaddress">Email</label>
                    <input type="email" id="eaddress" class="form-control form-control-lg" name="email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="tel">No Telp</label>
                    <input type="text" id="tel" class="form-control form-control-lg" name="no_telp">
                    @error('no_telp')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" cols="30" rows="10" class="form-control" name="pesan"></textarea>
                    @error('pesan')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection