@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

<div class="container">
    @if(session('success'))
    <div class="mt-5 bg-success p-4">
        <span class="font-medium text-light">{{ session('success') }}</span>
    </div>
    @endif

    <form action="{{ route('create.patient') }}" method="post">
        @csrf
        @method('post')
        <div class="card-body">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>

            <div class="form-group">
                <label for="Prenom">Prenom</label>
                <input type="text" class="form-control" id="Prenom" name="prenom">
            </div>

            <div class="form-group">
                <label for="Prenom">Telephone</label>
                <input type="tel" class="form-control" id="Prenom" name="telephone">
            </div>
            <div class="mt-4">
                <label for="gender">Genre</label>
                <div class="input-group-prepend">
                    <span class="input-group-text d-flex">
                        <label for="male">Homme</label>
                        <input type="radio" id="male" class="ml-2" name="gender" value="Homme">
                        <label for="female" class="ml-4">Femme</label>
                        <input type="radio" id="female" class="ml-2" name="gender" value="Femme">
                    </span>
                </div>
            </div>

            <div class="mt-4">
                <label for="gender">Handicape</label>
                <div class="input-group-prepend">
                    <span class="input-group-text d-flex">
                        <label for="male">Oui</label>
                        <input type="radio" id="male" class="ml-2" name="handicape" value="Oui">
                        <label for="female" class="ml-4">Non</label>
                        <input type="radio" id="female" class="ml-2" name="handicape" value="Non">
                    </span>
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="date">Date d'inscription</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>




        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Creer</button>
        </div>
    </form>

</div>
@endsection