@extends('template')

@section('contenu')
    <div class="col-sm-offset-4 col-sm-4">
    	<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Fiche d'utilisateur</div>
			<div class="panel-body"> 
				Voici les informations du compte sélectionné :
				<li>Nom : {{ $user->name }}</li>
				<li>Prénom : {{ $user->prenomUsers }}</li>
				<li>Pseudo : {{ $user->pseudoUsers }}</li>
				<li>Email : {{ $user->email }}</li>
				<li>Date de naissance : {{ $user->dateNaissanceUsers }}</li>
				
				<?php if($user->telPortUsers !=''){ ?>
					<li>Numéro de tel. portable : {{ $user->telPortUsers }}</li>				
				<?php } ?>
				
				<?php if($user->telFixeUsers !=''){ ?>
					<li>Numéro de tel. fixe : {{ $user->telFixeUsers }}</li>				
				<?php } ?>
				
				@if($user->admin == 1)
					Administrateur
				@endif
			</div>
		</div>				
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop