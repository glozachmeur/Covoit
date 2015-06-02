@extends('template')

@section('content')
	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Créer un nouveau message</h3>
				</div>
				
				<div class="panel-body">
		
					{!! Form::open(['route' => 'messages.store']) !!}
						<div class="form-group">
							{!! Form::label('subject', 'Sujet', ['class' => 'control-label']) !!}
							{!! Form::text('subject', null, ['class' => 'form-control']) !!}
						</div>
				
						<div class="form-group">
							{!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
							{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
						</div>
						
						@if(Input::get('dest_id')!=null)
				
							<?php
								$dest=App\User::find(Input::get('dest_id'));
			
							?>
							<div class="form-group">
								Destinataire : {{$dest->pseudoUsers}}
							</div>
							<input type="hidden" name="recipients[]" value="{!!$dest->id!!}">
						@else
							<?php
								$users=App\User::all();
								
								foreach($users as $user){
									if($user->id != Auth::user()->id){
										$listUsers[$user->id]=$user->pseudoUsers;
									}
								}
							?>
							Destinataire :
							{!! Form::select('recipients[]', $listUsers  , ['class' => 'dropdownn-menu']) !!}
							<br/><br/>
						@endif
									<!-- Submit Form Input -->
							<div class="form-group">
								{!! Form::submit('Envoyer', ['class' => 'btn btn-primary form-control']) !!}
							</div>
					{!! Form::close() !!}
		</div>
	</div>
@stop