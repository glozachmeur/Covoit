@extends('template')

@section('contenu')
    <div class="col-md-8 col-md-offset-2">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">	
			<div class="panel-heading">Espace mes trajets</div>
				<div class="panel-body">
					@if(Input::get('trajet_id')!==null)
						<?php
							DB::table('T_TRAJET')
								->where('id', Input::get('trajet_id'))
								->update(['statutTrajet' => 1]);
						?>
						<div class="alert alert-success" role="alert">
							<strong><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Le statut du trajet a bien été placé a effectué, les paiements sont validés.</strong>
						</div>
					@endif
				</div>
		</div>
		<a href="{{ url('/mytrajet') }}" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop