<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'description',
        'price',
        'cover_image',
        'status',

    ];

    public function Category (){
        return $this->belongsTo(Category::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
}

}
