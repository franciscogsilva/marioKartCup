@extends('front.layouts.front_layout')

@section('content')
	@include('admin.layouts.partials._messages')
	<div class="container container-col-fgs">
		<div class="section">
			<div class="row col-front">
				@foreach($tournaments as $tournament)
					<div class="col s12 m6 l6">
						<p class="subtitle-caption"><b>Torneo {{ $tournament->id }}</b></p>
						<div class="card">
							<div class="card-content">
								<ul class="collection">
									@foreach(App\User::getUserByTournament($tournament) as $user)
										<li class="collection-item avatar">
											<img src="{{ $user->image }}" alt="" class="circle">
											<span class="title">{{ $user->name }}</span>
											<p>{{ $user->getTotalPointsInTournament($tournament) }}<br>
											Second Line</p>
											<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
										</li>
									@endforeach
								</ul>
							</div>
							.<div class="card-action center">
								<a href="{{ route('tournaments.show', $tournament->id) }}" class="waves-effect waves-light btn">Ver Torneo</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection()