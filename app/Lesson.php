<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model {

	protected $table = 'lessons';

	public function course(){
		return $this->belongsTo('App\Course');
	}

}
