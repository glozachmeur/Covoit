@extends('template')
<?php
function makeList(){
	$villedep = Input::get('villeDepartTrajet');
	echo $villedep;
}
?>


@section('contenu')
<div class="col-sm-offset-2 col-sm-8">
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Trouver un trajet</div>
        <div class="panel-body">
            <div class="col-sm-12">
			
			<?php
			$villeDep= $editeurs = DB::table('T_TRAJET')->lists('villeDepartTrajet');
			$villeArr= $editeurs = DB::table('T_TRAJET')->lists('villeArriveeTrajet');
			?>
				{!! Form::open(array('url' => 'findtrajet', 'method' => 'post')) !!}
				
				<div class="form-group {!! $errors->has('villeDepartTrajet') ? 'has-error' : '' !!}">
						Ville de départ* :
						{!! Form::select('villeDepartTrajet', $villeDep , ['class' => 'form-control']) !!}
				</div>
				
				<div class="form-group {!! $errors->has('villeArriveeTrajet') ? 'has-error' : '' !!}">
						Ville d'arrivée* :
						{!! Form::select('villeArriveeTrajet', $villeArr , ['class' => 'form-control']) !!}
				</div>
				
				<div class="form-group {!! $errors->has('dateDebutTrajet') ? 'has-error' : '' !!}">
						Date du trajet* :
						{!! Form::date('dateDebutTrajet', null, ['class' => 'form-control']) !!}
				</div>
				
				{!! Form::submit('Lancer la recherche', ['class' => 'btn btn-primary pull-right']) !!}
				{!! Form::close() !!}
				
				@if(Input::get('villeDepartTrajet')!=null && Input::get('villeArriveeTrajet')!=null)
					<?php	
						$depart=Input::get('villeDepartTrajet');
						$arrivee=Input::get('villeArriveeTrajet');
						$date=Input::get('dateDebutTrajet');
						$trajets = App\Trajet::all();
					?>
					
					<br/><br/>
					<p>Voici les trajets trouvés.</p>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Ville de départ</th>
								<th>Ville d'arrivée</th>
								<th>Date</th>
								<th>Heure de départ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						@foreach ($trajets as $trajet)
							@if($date==null)
								@if($trajet->villeDepartTrajet == $villeDep[$depart] && $trajet->villeArriveeTrajet == $villeArr[$arrivee])
									<tr>
										<td>{!! $trajet->id !!}</td>
										<td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->villeArriveeTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->dateDebutTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->heureDepartTrajet !!}</strong></td>
										<td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
										<td>{!! link_to_route('trajet.show', 'Sélectionner', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
									</tr>
								@endif
							@else
								@if($trajet->villeDepartTrajet == $villeDep[$depart] && $trajet->villeArriveeTrajet == $villeArr[$arrivee] && $trajet->dateDebutTrajet == $date)
									<tr>
										<td>{!! $trajet->id !!}</td>
										<td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->villeArriveeTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->dateDebutTrajet !!}</strong></td>
										<td class="text-primary"><strong>{!! $trajet->heureDepartTrajet !!}</strong></td>
										<td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
										<td>{!! link_to_route('trajet.show', 'Sélectionner', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
									</tr>
								@endif
							@endif
						@endforeach
						</tbody>
					</table>
				@endif
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop