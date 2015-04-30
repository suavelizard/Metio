<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

	protected $table = 'courses';
	protected $fillable = ['name','description','start_date','end_date'];

	public function location(){
		return $this->belongsTo('App\Location');
	}

	public function instructor(){
		return $this->belongsTo('App\Instructor');
	}
	public function lessons(){
		return $this->hasMany('App\Lesson');
	}

	public function subject(){
		return $this->belongsTo('App\Subject');
	}

	public function program(){
		return $this->belongsTo('App\Program');
	}

	public function keywords()
    {
        return $this->morphToMany('App\Keyword', 'keywordable');
    }
}
