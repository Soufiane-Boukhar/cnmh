@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

<div class="container mt-4">
    @if(session('success'))
    <div class="mt-5 bg-success p-4">
        <span class="font-medium text-light">{{ session('success') }}</span>
    </div>
    @endif

    <div class="d-flex mt-4">
        <div>
            <form method="POST" action="{{ route('excel.export') }}">
                @csrf
                @method('post')
                <button type="submit" class="btn btn-success">Exporter</button>
            </form>
        </div>
        <div>
            <form method="POST" class="ml-4 d-flex" action="{{ route('excel.import') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <input type="file" class="form-control" name="fichier">
                <button type="submit" class="btn btn-primary">Importer</button>
            </form>
        </div>

    </div>

</div>

<div class="container mt-4">


    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Telephone</th>
                <th>Genre</th>
                <th>Handicape</th>
                <th>Date d-inscription</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @if(!empty($patients))
            @foreach($patients as $patient)
            <tr>
                <td>{{$patient->nom}}</td>
                <td>{{$patient->prenom}}</td>
                <td>{{$patient->telephone}}</td>
                <td>{{$patient->gender}}</td>
                <td>{{$patient->handicape}}</td>
                <td>{{$patient->date}}</td>
                <td>
                    <div class="d-flex">
                        <form action="{{ route('patient.show', ['id' => $patient->id]) }}" method="get">
                            <button type="submit" class="btn btn-success">Editer</button>
                        </form>
                        <button type="button" onclick="performDelete(event)" class="btn btn-danger ml-2"
                            data-id="{{$patient->id}}" data-toggle="modal" data-target="#modal-danger">
                            Supprimer
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach


            @endif
        </tbody>
    </table>

</div>

<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Danger Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="delete-form">
                @csrf
                @method('post')
                <input type="hidden" name="id" id="id" value="">
                <script>
                function performDelete(event) {
                    console.log('Hello');
                    var id = event.target.getAttribute('data-id');
                    document.querySelector('#id').value = id;
                    var form = document.querySelector('#delete-form');
                    form.action = "{{ route('delete', ['id' => ':value']) }}".replace(':value', id);
                }
                </script>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer ce patient ?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-outline-light">Oui</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection