@extends('layouts.layout')
@extends('layouts.nav')
@section('content')

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
                  </tr>
                  </thead>
                  <tbody>

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
                 
                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                       <div class="d-flex">
                       <form method="POST" action="{{ route('excel.export') }}" >
                            @csrf
                            @method('post')
                            <input type="text" name="name" placeholder="Nom de fichier" >
                            <select name="extension" >
                                <option value="xlsx" >.xlsx</option>
                                <option value="csv" >.csv</option>
                            </select>
                            <button type="submit" >Exporter</button>
                        </form>
                            <form method="POST" action="{{ route('excel.import') }}" enctype="multipart/form-data" >
                                @csrf
                                @method('post')
                                <input type="file" name="fichier">

                                <button type="submit">Importer</button>
                            </form>
                        </div>
                    </th>
                  </tr>
                  </tfoot>
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