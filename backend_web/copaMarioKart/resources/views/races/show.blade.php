@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title_page }}</div>
                <div class="panel-body">              
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif                    
                    <div class="row">
                        <div class="col-md-12"><p class="pull-right"><a type="button" class="btn btn-success" href="{{ route('races.create', [$tournament, $cup]) }}">Agregar Jugador a Carrera</a></p></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach($cup->races as $race)
                                    <tr>
                                        <td>{{ $race->id }}</td>
                                        <td>{{ $race->status }}</td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
