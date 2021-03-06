<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model {

	protected $fillable = ['title', 'slug', 'content', 'online_available', 'category_id', 'tags_list'];

	public function category() {
	    return $this->belongsTo('App\Category');
    }

    public function tags () {
	    return $this->belongsToMany('App\Tag');
    }

    //region tags_list getter and setter
    public function getTagsListAttribute () {
        if($this->id){
            return $this->tags->lists('id');
        }
    }
    public function setTagsListAttribute ($value) {
	    if($this->id){
            $this->tags()->sync($value);
        } else {
            $this->tags()->sync($value, false);
        }
    }
    //endregion

	public function scopePublished ($query) {
	    return $query->where("online_available", true)->whereRaw("created_at < NOW()");
    }

    public function scopeSearchBytitle ($query, $search) {
	    return $query->where('title', 'LIKE', '%' . $search . '%');
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
