@extends('layouts.layout')
@extends('layouts.nav')

@section('content')

<div class="container">
    @if(session('success'))
    <div class="mt-5 bg-success p-4">
        <span class="font-medium text-light">{{ session('success') }}</span>
    </div>
    @endif
    <form action="{{ route('edit.patient', ['id' => $patient->id]) }}" method="post">

        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $patient->nom }}">
            </div>

            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $patient->prenom }}">
            </div>

            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="tel" class="form-control" id="telephone" name="telephone"
                    value="{{ $patient->telephone }}">
            </div>

            <div class="mt-4">
                <label for="gender">Genre</label>
                <div class="input-group-prepend">
                    <span class="input-group-text d-flex">
                        @if($patient->gender === 'Homme')
                        <label for="male">Homme</label>
                        <input type="radio" id="male" class="ml-2" name="gender" value="Homme" checked>
                        <label for="female" class="ml-4">Femme</label>
                        <input type="radio" id="female" class="ml-2" name="gender" value="Femme">
                        @else
                        <label for="male">Homme</label>
                        <input type="radio" id="male" class="ml-2" name="gender" value="Homme">
                        <label for="female" class="ml-4">Femme</label>
                        <input type="radio" id="female" class="ml-2" name="gender" value="Femme" checked>
                        @endif
                    </span>
                </div>
            </div>

            <div class="mt-4">
                <label for="handicape">Handicape</label>
                <div class="input-group-prepend">
                    <span class="input-group-text d-flex">
                        @if($patient->handicape === 'Oui')
                        <label for="oui">Oui</label>
                        <input type="radio" id="oui" class="ml-2" name="handicape" value="Oui" checked>
                        <label for="non" class="ml-4">Non</label>
                        <input type="radio" id="non" class="ml-2" name="handicape" value="Non">
                        @else
                        <label for="oui">Oui</label>
                        <input type="radio" id="oui" class="ml-2" name="handicape" value="Oui">
                        <label for="non" class="ml-4">Non</label>
                        <input type="radio" id="non" class="ml-2" name="handicape" value="Non" checked>
                        @endif
                    </span>
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="date">Date d'inscription</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $patient->date }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Editer</button>
        </div>
    </form>
</div>
@endsection