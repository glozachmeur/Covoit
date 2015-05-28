@extends('template')

@section('contenu')
    <div class="col-md-8 col-md-offset-2">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-default">	
			<div class="panel-heading">Espace mes trajets</div>
				<div class="panel-body">
					<?php $nbTrajets = Auth::user()->trajets->count(); ?>
					<h2>Conducteur</h2>
					@if($nbTrajets > 0)
						<p><br/>Voici les trajets dans lesquels vous êtes conducteur.</p>
						<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Ville de départ</th>
								<th>Ville d'arrivée</th>
								<th>Date</th>
								<th>Heure de départ</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach (Auth::user()->trajets as $trajet)
							<tr>
								<td>{!! $trajet->id !!}</td>
								<td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajet->villeArriveeTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajet->dateDebutTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajet->heureDepartTrajet !!}</strong></td>
								<td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
								<td>
									{!! Form::open(['method' => 'DELETE', 'route' => ['trajet.destroy', $trajet->id]]) !!}
									{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce trajet ?\')']) !!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
						</tbody>
						</table>
					@else
						<p>Vous n'avez aucun trajet de prévu en tant que conducteur.</p>
					@endif
					
					<h2>Passager</h2>
				</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop