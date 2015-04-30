<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

	protected $table = 'subjects';

	public function courses(){
		return $this->hasMany('App\Course');
	}

}
