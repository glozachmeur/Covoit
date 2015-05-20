<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model {

    protected $table = 'T_TRAJET';

	protected $fillable = ['villeDepartTrajet', 'villeArriveeTrajet', 'dateTrajet', 'appreciationTrajet', 'nbPlaces', 'pppTrajet', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
