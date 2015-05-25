@extends('template')

@section('contenu')
<div class="col-sm-offset-4 col-sm-4">
    @if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
	@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Créer un trajet</div>
        <div class="panel-body">
            <div class="col-sm-12">
				<?php $id = Auth::user()->id; ?>
                {!! Form::open(['url' => 'trajet', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                <div class="form-group {!! $errors->has('villeDepartTrajet') ? 'has-error' : '' !!}">
                    Ville de départ* :
                    {!! Form::text('villeDepartTrajet', null, ['class' => 'form-control', 'placeholder' => 'Départ']) !!}
                    {!! $errors->first('villeDepartTrajet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('villeArriveeTrajet') ? 'has-error' : '' !!}">
                    Ville d'arrivée* :
                    {!! Form::text('villeArriveeTrajet', null, ['class' => 'form-control', 'placeholder' => 'Arrivée']) !!}
                    {!! $errors->first('villeArriveeTrajet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('dateDebutTrajet') ? 'has-error' : '' !!}">
					Date du trajet*
					{!! Form::date('dateDebutTrajet', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('dateDebutTrajet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('nbPlacesTrajet') ? 'has-error' : '' !!}">
                    Nombre de places disponibles* :
                    {!! Form::selectRange('nbPlacesTrajet', 1, 5, null, ['class' => 'form-control', 'placeholder' => 'Nombre de places disponibles']) !!}
                    {!! $errors->first('nbPlacesTrajet', '<small class="help-block">:message</small>') !!}
                </div>
				<div class="form-group {!! $errors->has('dureeTrajet') ? 'has-error' : '' !!}">
                    Durée du trajet :*
                    <input type="time" class="form-control" name="dureeTrajet">
                    {!! $errors->first('dureeTrajet', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('pppTrajet') ? 'has-error' : '' !!}">
                    Prix par passagers (€):
                    {!! Form::selectRange('pppTrajet', 1, 99, null, ['class' => 'form-control']) !!}
                </div>
				{!! Form::hidden('idConducteurTrajet', $id) !!}
                {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
    </a>
</div>
@stop