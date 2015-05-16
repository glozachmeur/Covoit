@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Modification d'un utilisateur</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
					  	Nom :
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
					  	{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('prenomUsers') ? 'has-error' : '' !!}">
					  	Prénom :
						{!! Form::text('prenomUsers', null, ['class' => 'form-control', 'placeholder' => 'Prénom']) !!}
					  	{!! $errors->first('prenomUsers', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
					  	Adresse e-mail :
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
					  	{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('pseudoUsers') ? 'has-error' : '' !!}">
					  	Pseudo : 
						{!! Form::text('pseudoUsers', null, ['class' => 'form-control', 'placeholder' => 'Pseudo']) !!}
					  	{!! $errors->first('pseudoUsers', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('dateNaissanceUsers') ? 'has-error' : '' !!}">
					  	Date de naissance :
						{!! Form::date('dateNaissanceUsers',  Auth::user()->dateNaissanceUsers) !!}
					  	{!! $errors->first('dateNaissanceUsers', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('telPortUsers') ? 'has-error' : '' !!}">
					  	Numéro tel portable :
						{!! Form::text('telPortUsers', null, ['class' => 'form-control', 'placeholder' => 'Numéro de tel. portable']) !!}
					  	{!! $errors->first('prenomUsers', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('telFixeUsers') ? 'has-error' : '' !!}">
						Numéro tel fixe :
					  	{!! Form::text('telFixeUsers', null, ['class' => 'form-control', 'placeholder' => 'Numéro de tel. fixe']) !!}
					  	{!! $errors->first('prenomUsers', '<small class="help-block">:message</small>') !!}
					</div>
					
					<div class="form-group {!! $errors->has('photoUsers') ? 'has-error' : '' !!}">
						Photo de profil
					  	{!! Form::file('photoUsers', null, ['class' => 'form-control', 'placeholder' => 'Photo']) !!}
					  	{!! $errors->first('photoUsers', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								{!! Form::checkbox('admin', 1, null) !!}Administrateur
							</label>
						</div>
					</div>
						{!! Form::submit('Modifier', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop