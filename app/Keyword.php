<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model {

    public function courses()
    {
        return $this->morphedByMany('App\Course', 'keywordable');
    }


}
