@extends('template')

@section('contenu')
<div class="col-sm-offset-4 col-sm-4">
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">Fiche trajet</div>
        <div class="panel-body">
            <p>Voici les informations du trajet sélectionné :</p><br/>
            <li>Ville de départ : <strong>{{ $trajet->villeDepartTrajet }}</strong></li>

            <li>Ville d'arrivée : <strong>{{ $trajet->villeArriveeTrajet }}</strong></li>
			
            <li>Date du trajet : <strong>{{ $trajet->dateDebutTrajet }}</strong></li>

            <li>Heure de départ : <strong>{{ $trajet->heureDepartTrajet }}</strong></li>

            <li>Prix par personne : <strong>{{ $trajet->pppTrajet }} €</strong></li>
			
			<li>Nombres de places disponibles :<strong>{{ $trajet->nbPlacesTrajet }}</strong></li>
			
			@if($trajet->idConducteurTrajet == Auth::user()->id || Auth::user()->admin)
				<br/><p>Liste des passagers :</p><br/>
				<?php
					$users = $trajet->passagers;
				?>
				<table class="table">
					<thead>
						<tr>
							<th>Pseudo</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
							<tr>
								<td class="text-primary"><strong>{!! $user->pseudoUsers !!}</strong></td>
								<td>{!! link_to_route('user.show', 'Voir', [$user->id], ['class' => 'btn btn-success btn-block']) !!}</td>	
								<td>
									{!! Form::open(array('url' => '/messages/create')) !!}
									{!! Form::hidden('dest_id', $user->id) !!}
									{!! Form::submit('Envoyer un message', ['class' => 'btn btn-success btn-block']) !!}
									{!! Form::close() !!}
								</td>						
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop