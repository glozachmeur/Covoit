@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div class="panel panel-primary">	
			<div class="panel-heading">Espace mon compte</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					<?php $user=Auth::user(); ?>
					{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put',  'files'=>true, 'class' => 'form-horizontal panel']) !!}
						<div class="form-group">
							<p>Nom : {{ $user->name }}
							<p>Prénom : {{ $user->prenomUsers }}</p>
							<p>Email : {{ $user->email }}</p>
							<p>Pseudo : {{ $user->pseudoUsers }}</p>
							<p>Date de naissance : {{ $user->dateNaissanceUsers }}<p>
						</div>
						<div class="form-group {!! $errors->has('telPortUsers') ? 'has-error' : '' !!}">
							Téléphone portable*
							{!! Form::text('telPortUsers', null, ['class' => 'form-control']) !!}
							{!! $errors->first('telPortUsers', '<small class="help-block">:message</small>') !!}
						</div>
						<div class="form-group {!! $errors->has('telFixeUsers') ? 'has-error' : '' !!}">
							Téléphone fixe
							{!! Form::text('telFixeUsers', null, ['class' => 'form-control']) !!}
							{!! $errors->first('telFixeUsers', '<small class="help-block">:message</small>') !!}
						</div>
						<div class="form-group {!! $errors->has('photoUsers') ? 'has-error' : '' !!}">
							Photo de profil actuelle :
							<img src="../../public/images/{!! $user->photoUsers !!}" alt="Photo de profil" class="img-thumbnail">
						</div>
						
						<div class="form-group {!! $errors->has('photoUsers') ? 'has-error' : '' !!}">
						<label class="col-md-4 control-label">Changer de photo de profil*</label>
							<div class="col-md-6">
								<input type="file" class="form-control" name="photo">
							</div>
						</div>
						{!!  Form::hidden('fromAccount', true) !!}
						{!! Form::submit('Enregistrer informations', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop