<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Category;
use App\Models\SubCategory;

class Blog extends Model
{
    use HasFactory;

    public function getMetaTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getOgTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
