@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-4 col-sm-4">
        @if(session()->has('ok'))
            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Liste des trajets</h3>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trajet as $trajet)
                    <tr>
                        <td>{!! $trajet->id !!}</td>
                        <td class="text-primary"><strong>{!! $trajet->villeDepartTrajet !!}</strong></td>
                        <td>{!! link_to_route('trajet.show', 'Voir', [$trajet->id], ['class' => 'btn btn-success btn-block']) !!}</td>
                        <td>{!! link_to_route('trajet.edit', 'Modifier', [$trajet->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['trajet.destroy', $trajet->id]]) !!}
                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce trajet ?\')']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {!! link_to_route('trajet.create', 'Ajouter un trajet', [], ['class' => 'btn btn-info pull-right']) !!}
        {!! $links !!}
    </div>
@stop