<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\subcategory;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'user_id',
        'title',
        'slug',
        'post_date',
        'description',
        'image',
    ];

    // join with category

    public function category(){
        return $this->belongsTo(category::class,'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(subcategory::class,'subcategory_id');
    }

    public function user(){
        return $this->belongsTo(user::class,'user_id');
    }
}
