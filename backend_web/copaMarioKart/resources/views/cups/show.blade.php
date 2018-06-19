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
                    <div class="panel panel-default">
                        <div class="panel-heading">Jugadores</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 btn-karts">
                                    <a type="button" class="btn btn-success btn-block {{ $cup->status==='Closed'?'disabled':'' }}" data-toggle="modal" data-target="#addPlayer">Agregar Jugador a Copa</a>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 btn-karts">
                                    <a type="button" class="btn btn-primary btn-block {{ count($cup->participations)<=0?'disabled':'' }} {{ $cup->status==='Closed'?'disabled':'' }}" data-toggle="modal" data-target="#addResults">Agregar resultados de Copa</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Jugador</th>
                                        <th>Personaje</th>
                                        @if($cup->status=='Open')
                                            <th>Opción</th>
                                        @else 
                                            <th>Posición/Puntos</th>
                                        @endif
                                    </thead>
                                    <tbody>
                                        @foreach($cup->participations->sortBy('position_id') as $participation)
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="factory-logo-fgs responsive-img circle materialboxed initialized" src="{{ asset($participation->user->image) }}">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{ $participation->user->name }}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="factory-logo-fgs responsive-img circle materialboxed initialized" src="{{ asset($participation->character->image) }}">
                                                            </a>
                                                        </div>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{ $participation->character->name }}</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if($cup->status=='Open')
                                                        <a href="{{ route('participations.delete', $participation) }}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                                                    @else 
                                                        {{ $participation->position->id }}/{{ $participation->position->points }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal fade" tabindex="-1" role="dialog" id="addPlayer">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Agregar Jugador a Copa</h4>
                                    </div>
                                    <div class="modal-body">                                        
                                        {!! Form::open(['route' => ['participations.store', $cup], 'method' => 'POST']) !!}
                                            <div class="form-group">
                                                {!! Form::label('user_id', 'Usuario', ['class' => 'col-sm-2 control-label']) !!}
                                                <div class="col-sm-10">  
                                                    {!! Form::select('user_id', $users, null, ['class' => 'form-control ', 'uniqued', 'required', 'placeholder' => 'Seleccione usuario a agregar']) !!}                 
                                                </div>
                                            </div>
                                            <div class="row"></div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            {!! Form::submit('Agregar Usuario', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" tabindex="-1" role="dialog" id="addResults">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Agregar Resultados a Copa</h4>
                                    </div>
                                    <div class="modal-body">                                        
                                        {!! Form::open(['route' => ['participations.update', $cup], 'method' => 'PUT']) !!}
                                            <div class="list-group">
                                                @foreach($cup->participations as $participation)
                                                    <div class="list-group-item">
                                                        <div class="row">
                                                            <p>{{ $participation->user->name }}</p>
                                                            <div class="form-group">
                                                                {!! Form::label('position', 'Posición', ['class' => 'col-sm-2 control-label']) !!}
                                                                <div class="col-sm-10">
                                                                    <select name="positions[{{$participation->id}}]" class="form-control">
                                                                        <option value="" selected="selected">Selecciona la posición del jugador</option>
                                                                        @for($i = 1; $i <= 12; $i++)
                                                                            @if($participation->position)
                                                                                <option value="{{ $i }}" {{ $participation->position===$i?'selected=selected':'' }}>{{ $i }}</option>
                                                                            @else
                                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                            @endif
                                                                        @endfor
                                                                    </select>                
                                                                </div>
                                                            </div>
                                                            <div class="row"></div>
                                                            <div class="form-group">
                                                                {!! Form::label('points', 'Puntos', ['class' => 'col-sm-2 control-label']) !!}
                                                                <div class="col-sm-10">
                                                                    {!! Form::text('points['.$participation->id.']', $participation->points?$participation->points:null, ['class' => 'form-control', 'placeholder' => '# de puntos obtenidos', 'required']) !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                            {!! Form::submit('Agregar Resultados', ['class' => 'btn btn-success']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('#addPlayer').on('shown.bs.modal', function () {

        });
        $('#addResults').on('shown.bs.modal', function () {

        });
    </script>
@endsection
