<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use Searchable, HasFactory, SoftDeletes;

    protected $fillable =[
        'title',
        'price',
        'body',
        'user_id',
        'category_id',
        "is_accepted",
        "deleted_at"
    ];
    
    public function toSearchableArray()
    {
        $array = $this->toArray();
        
        $array['title'] = $this->title;
        $array['body'] = $this->body;
        $array['category'] = $this->category;

        return $array;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function setApproved($el)
    {
        $this->is_accepted = $el;
        $this->save();
        return true;
    }

    public static function reviseNotification(){
        return Article::where("is_accepted", null)->count();
    }

    //Gestione Image
    public function images(){

        return $this->hasMany(Image::class);
    }

}
