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
                        <div class="col-md-12"><p class="pull-right"><a type="button" class="btn btn-success" href="{{ route('tournaments.create') }}">Nuevo Torneo</a></p></div>
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
                                @foreach($tournaments as $tournament)
                                    <tr>
                                        <td>{{ $tournament->id }}</td>
                                        <td>
                                            <img src="" class="img-responsive img-circle img-karts">
                                        </td>
                                        <td>
                                            <ul class="list-group">
                                                @foreach($tournament->cups as $cup)
                                                    @foreach($cup->participations as $participation)
                                                        
                                                    @endforeach
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('tournaments.show', $tournament->id) }}"><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button></a>
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
