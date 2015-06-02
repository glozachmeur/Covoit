@extends('template')

@section('content')
    <div class="col-md-offset-2 col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des messages</h3>
			</div>
			
			<div class="panel-body">
			
			<h2>{!! $thread->subject !!}</h2>
	
			@foreach($thread->messages as $message)
				
				@if($message->user->name!=Auth::user()->name)
					<div class="media">			
						<div class="col-md-6">
							<div class="alert alert-info" role="alert">
								<div class="media-body">
									<h5 class="media-heading"><strong>{!! $message->user->pseudoUsers !!}</strong></h5>
									<p>{!! $message->body !!}</p>
									<div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
								</div>
							</div>
						</div>
						<div class="row"></div>
					</div>

				@else
					<div class="media">			
						<div class="col-md-offset-6">
							<div class="alert alert-success" role="alert">
								<div class="media-body">
									<h5 class="media-heading"><strong>{!! $message->user->pseudoUsers !!}</strong></h5>
									<p>{!! $message->body !!}</p>
									<div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
								</div>
							</div>
						</div>
					</div>
				@endif		
			@endforeach
	
			<h3>Ajouter un nouveau message</h3>
			{!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
			<!-- Message Form Input -->
			<div class="form-group">
				{!! Form::textarea('message', null, ['class' => 'form-control']) !!}
			</div>
	
			@if($users->count() > 0)
				<div class="checkbox">
					@foreach($users as $user)
						<label title="{!! $user->name !!}"><input type="checkbox" name="recipients[]" value="{!! $user->id !!}">{!! $user->name !!}</label>
					@endforeach
				</div>
			@endif
	
						<!-- Submit Form Input -->
				<div class="form-group">
					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary form-control']) !!}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
    </div>
@stop