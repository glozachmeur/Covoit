@extends('template')

@section('contenu')
    <div class="col-md-8 col-md-offset-2">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">	
			<div class="panel-heading">Espace mes trajets</div>
				<div class="panel-body">
					<?php $nbTrajets = Auth::user()->trajets->count(); ?>
					
					<h3><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Conducteur</h3>
					
					@if($nbTrajets > 0)
						<p><br/>Voici les trajets dans lesquels vous êtes conducteur.</p>
						<table class="table">
						<thead>
							<tr>
								<th>Ville de départ</th>
								<th>Ville d'arrivée</th>
								<th>Date</th>
								<th>Heure de départ</th>
								<th>Nombre de places</th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach (Auth::user()->trajets as $trajet)
							<?php
								if($trajet->nbPlacesTrajet !=0){
									$nbPlaces = $trajet->nbPlacesTrajet;
								}else{
									$nbPlaces = "Complet";
								}
							?>
							<tr>
								<td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajet->villeArriveeTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajet->dateDebutTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajet->heureDepartTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!!  $nbPlaces !!}</strong></td>
								<td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
								@if(!$trajet->statutTrajet)
									<td>
										{!! Form::open(array('url' => '/statutTrajet') ) !!}
										{!! Form::hidden('trajet_id', $trajet->id) !!}
										{!! Form::button('<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Effectué', ['class' => 'btn btn-warning btn-block', 'onclick' => 'return confirm(\'Voulez vous vraiment valider ce trajet ?\nLes paiements seront ensuite validés.\')', 'type'=>'submit)']) !!}
										{!! Form::close() !!}
									</td>
									<td>
										{!! Form::open(['method' => 'DELETE', 'route' => ['trajet.destroy', $trajet->id]]) !!}
										{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce trajet ?\')']) !!}
										{!! Form::close() !!}
									</td>
								@else
									<td>
										<strong>Trajet effectué</strong>
									</td>
								@endif
							</tr>
						@endforeach
						</tbody>
						</table>
					@else
						<div class="alert alert-warning" role="alert">
							<strong>Vous n'avez aucun trajet de prévu en tant que conducteur.</strong>
						</div>
					@endif
					
					<br/><h3><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Passager</h3>
					
					<?php $nbTrajets = Auth::user()->trajetsPassager->count(); ?>
					@if($nbTrajets > 0)
						<p>Voici les trajets dans lesquels vous êtes passager.</p>
						<table class="table">
						<thead>
							<tr>
								<th>Ville de départ</th>
								<th>Ville d'arrivée</th>
								<th>Date</th>
								<th>Heure de départ</th>
								<th>Nombre de places</th>
								<th>Statut</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach (Auth::user()->trajetsPassager as $trajetPassager)
							<?php
								if($trajetPassager->nbPlacesTrajet !=0){
									$nbPlaces = $trajetPassager->nbPlacesTrajet;
								}else{
									$nbPlaces = "Complet";
								}
								
								if($trajetPassager->statutTrajet){
									$statut = "Effectué";
								}else{
									$statut = "Non effectué";
								}
							?>
							<tr>
								<td class="text-primary"><strong>{!! $trajetPassager->villeDepartTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajetPassager->villeArriveeTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajetPassager->dateDebutTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $trajetPassager->heureDepartTrajet !!}</strong></td>
								<td class="text-primary"><strong>{!! $nbPlaces !!}</strong></td>
								<td class="text-primary"><strong>{!! $statut !!}</strong></td>
								<td>{!! link_to_route('trajet.show', 'Voir', [$trajetPassager->id], ['class' => 'btn btn-success btn-block']) !!}</td>
							</tr>
						@endforeach
						</tbody>
						</table>
					@else
						<div class="alert alert-warning" role="alert">
							<strong>Vous n'avez aucun trajet de prévu en tant que passager.</strong>
						</div>
					@endif
				</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop