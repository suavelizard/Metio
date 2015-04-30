<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {

	protected $table = 'locations';
	protected $fillable = ['name'];

	public function courses(){
		return $this->hasMany('App\Course');
	}

}
