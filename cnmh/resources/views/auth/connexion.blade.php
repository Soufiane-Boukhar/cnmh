@extends('layouts.auth')
@section('auth')
@if(session('success'))
    <div class="mt-5 bg-success p-4">
        <span class="font-medium text-light">{{ session('success') }}</span>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger p-4">
      <span class="font-medium text-dark">{{ session('error') }}</span>
    </div>
@endif

<div class="d-flex justify-content-center">
<div class="register-box" style="width:50vw;">
    <div class="card card-outline">
        <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b style="font-family: 'Belleza', sans-serif;">CNMH</b></a>
        </div>
        <div class="card-body">
        <p class="login-box-msg" style="font-family: 'Belleza', sans-serif;">Restez en contact avec nous</p>

        <form action="{{ route('check.login') }}" method="post">
            @csrf
            @method('post')
           
            <div class="input-group mb-3">
               <input type="email" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" >
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block"  style="font-family: 'Belleza', sans-serif;">Connexion</button>
            </div>
            </div>
        </form>

        

        <a href="{{ route('inscription') }}" class="text-center mb-3"  style="font-family: 'Belleza', sans-serif;">Je n'ai pas un compte</a>
        </div>
    </div>
</div>

@endsection
