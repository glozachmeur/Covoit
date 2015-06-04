@extends('template')

@section('contenu')
    <div class="col-md-10 col-md-offset-1">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">	
			<div class="panel-heading">Confirmation</div>
				<div class="panel-body">
				
					@if(Input::get('note')!=null && Input::get('trajet_id') != null)
						<?php
							$note = Input::get('note');
							$trajet = Input::get('trajet_id');
							
							$appreciations=App\Appreciation_trajet::all();
							$ever_rated=false;
							foreach($appreciations as $appreciation){
								if($appreciation->trajet_id==$trajet_id 
									&& $appreciation->user_id==$user){
									$ever_rated=true;
								}
							}
						?>
						@if(!$ever_rated)
								<?php
							DB::table('t_appreciation_trajet')->insert(
								['trajet_id' => $trajet, 'user_id' => Auth::user()->id, 'valeurAppreciation' => $note]
							);
								?>
						@endif
						<div class="alert alert-success" role="alert">
							<strong>Votre note a bien été enregistrée.</strong>
						</div>
					@endif		
				
				</div>
		</div>
		<a href="{{ url('/mytrajet') }}" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop