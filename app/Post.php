<?php

namespace App;

use Carbon\Carbon;

class Post extends Model //Extends our own model instead of eloquent, less safe
{
    //allow only the keywords to be submitted
    //protected  $fillable = ['title', 'body'];
    //guarded - allow everything except the keywords, >> protected $guarded = []; << allows everything
    //you can also make a parent class with these variables

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        // any post may have many tags
        // any tag may be applied to many posts
        return $this->belongsToMany(Tag::class);
    }

    public function addComment($body){
        $this->comments()->create(compact('body'));
    }

    public function scopeFilter($query, $filters){
        if (isset($filters['month'])){
            $month = $filters['month'];
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if(isset($filters['year'])){
            $year = $filters['year'];
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
