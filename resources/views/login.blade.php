@extends('layouts.front-app')
@section('content')
<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="index.html">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Login</span>
    </div>
</div>

<div class="site-section">
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="username">Email</label>
                            <input type="email" id="username" class="form-control form-control-lg" name="email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="pword">Password</label>
                            <input type="password" id="pword" class="form-control form-control-lg" name="password">
                            @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="Log In" class="btn btn-primary btn-lg px-5">
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>
@endsection