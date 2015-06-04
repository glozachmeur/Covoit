@extends('template')

@section('contenu')
    <div class="col-md-10 col-md-offset-1">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">	
			<div class="panel-heading">Confirmation</div>
				<div class="panel-body">
					@if(Input::get('note')!=null && Input::get('user_id') != null && Input::get('trajet_id')!=null)
						<?php
							$trajet_id=Input::get('trajet_id');
							$note = Input::get('note');
							$user = Input::get('user_id');
							
							$appreciations=App\Appreciation_user::all();
							$ever_rated=false;
							foreach($appreciations as $appreciation){
								if($appreciation->trajet_id==$trajet_id
									&& $appreciation->user_rater==Auth::user()->id 
									&& $appreciation->user_id==$user){
									$ever_rated=true;
								}
							}
						?>
							@if(!$ever_rated)
								<?php
									DB::table('t_appreciation_user')->insert(
										['user_rater' => Auth::user()->id, 'trajet_id' => $trajet_id, 'user_id' => $user, 'valeurAppreciation' => $note]
									);
								?>
							@else
								<div class="alert alert-warning" role="alert">
									<strong>Vous avez déjà noté ce passager.</strong>
								</div>
							@endif
						?>
						<div class="alert alert-success" role="alert">
							<strong>Votre note a bien été enregistrée.</strong>
						</div>
					@endif						
				</div>
		</div>
		<a href="{{ url('/trajet/'.$trajet_id) }}" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop