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
                        <div class="col-md-12"><p class="pull-right"><a type="button" class="btn btn-success" href="{{ route('cups.create', $tournament) }}">Agregar Copa a Torneo</a></p></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Ganador</th>
                                <th>Resultado</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach($tournament->cups->sortByDesc('id') as $cup)
                                    <tr>
                                        <td>{{ $cup->id }}</td>
                                        <td>
                                            <img src="{{ $cup->participations->sortBy('position')->first()->user->image }}" class="img-responsive img-circle img-karts" alt="Responsive image">
                                        </td>
                                        <td>
                                            <ul class="list-group">
                                                @foreach($cup->participations->sortBy('position') as $participation)
                                                    <li class="list-group-item {{ $participation->position=='1'?'list-group-item-success':'' }} {{ $participation->position=='2'?'list-group-item-info':'' }} {{ $participation->position=='3'?'list-group-item-warning':'' }}">#{{ $participation->position }} {{ $participation->user->name }}= {{ $participation->points }} Puntos</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('cups.show', $cup->id) }}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></a>
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
