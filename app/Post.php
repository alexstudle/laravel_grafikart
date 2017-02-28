<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model {

	protected $fillable = ['title', 'slug', 'content', 'online_available'];

	public function category() {
	    $this->belongsTo('App\Category');
    }

	public function scopePublished ($query) {
	    return $query->where("online_available", true)->whereRaw("created_at < NOW()");
    }

    public function scopeSearchBytitle ($query, $search) {
	    return $query->where('title', 'LIKe', '%' . $search . '%');
    }


    public function getTitleAttribute($value){
        return strtolower($value);
    }
    //public function setTitleAttribute($value){
    //    $this->attributes['title'] = strtoupper($value);
    //}

    public function setSlugAttribute($value){
        if(empty($value)){
            $this->attributes['slug'] = Str::slug($this->title);
        }
    }

    public function getDates() {
        return ['created_at', 'published_at', 'updated_at'];
    }

}
