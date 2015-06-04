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
				@if($user->notes->count()!=0)
								<?php
									$note_moyenne=0;
									$i=0;
									foreach($user->notes as $appreciation){
										$i++;
										$note=$appreciation->valeurAppreciation;
										$note_moyenne+=$note;
									}
									$note_moyenne=$note_moyenne/$i;
								?>
								<li>Note moyenne de passager : <strong>{{ $note_moyenne }}/10</strong></li>
							@endif
							
							@if($user->trajets->count()!=0)
								<?php
									$aEteNote= false;
									foreach($user->trajets as $trajet){
										if($trajet->note->count()!=0){
											$aEteNote=true;
										}
									}
								?>
								@if($aEteNote)
									<?php
									
										$note_moyenne=0;
										$i=0;
										foreach($user->trajets as $trajet){
											foreach($trajet->note as $appreciation){
												$i++;
												$note=$appreciation->valeurAppreciation;
												$note_moyenne+=$note;
											}
										}
										$note_moyenne=$note_moyenne/$i;
									?>
								
									<li>Note moyenne de conducteur : <strong>{{ $note_moyenne }}/10</strong></li>
								@endif
							@endif
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