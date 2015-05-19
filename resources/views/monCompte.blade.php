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
					{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
						<div class="form-group">
							<p>Nom : {{ $user->name }}
							<p>Prénom : {{ $user->prenomUsers }}</p>
							<p>Email : {{ $user->email }}</p>
							<p>Pseudo : {{ $user->pseudoUsers }}</p>
							Date de naissance : {{ $user->dateNaissanceUsers }}
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
							Photo de profil
							{!! Form::file('photoUsers', null) !!}
							{!! $errors->first('photoUsers', '<small class="help-block">:message</small>') !!}
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