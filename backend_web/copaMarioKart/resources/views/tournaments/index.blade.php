@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $title_page }}</div>

                <div class="panel-body">                    
                    <div class="row">
                        <div class="col-md-12"><p class="pull-right"><button type="button" class="btn btn-success">Crear Torneo</button></p></div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                                @foreach($tournaments as $tournament)
                                    <tr>
                                        <td>{{ $tournament->id }}</td>
                                        <td>{{ $tournament->status }}</td>
                                        <td>
                                            <a href="{{ route('tournaments.edit', $tournament->id) }}"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
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
