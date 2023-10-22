@extends('layouts.auth')
@section('auth')
<div class="d-flex justify-content-center">

<div class="register-box" style="width:50vw;">
    <div class="card card-outline">
        <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b style="font-family: 'Belleza', sans-serif;">CNMH</b></a>
        </div>
        <div class="card-body">
        <p class="login-box-msg" style="font-family: 'Belleza', sans-serif;">Inscrire un nouveau habitant</p>

        <form action="{{ route('create.user') }}" method="post">
            @csrf 
            @method('POST')
            <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            </div>

           
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password"  name="password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
               <select class="form-control" id="exampleSelectBorder"  name="role">
                    <option>Choisir le role</option>
                    <option>Service social</option>
                    <option>Psyco</option>
                </select>
            </div>
            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms"  style="font-family: 'Belleza', sans-serif;">
                J'accepte les <a href="#"  style="font-family: 'Belleza', sans-serif;">conditions</a>
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block"  style="font-family: 'Belleza', sans-serif;">Inscrire</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

        

        <a href="{{ route('login') }}" class="text-center"  style="font-family: 'Poppins', sans-serif;">J'ai déjà un compte</a>
        </div>
    </div>
</div>


</div>

@endsection
