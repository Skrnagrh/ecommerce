<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // use Sluggable;
    // protected $fillable = ['title', 'description', 'category', 'quantity', 'price', 'discount_price', 'image'];

    protected $guarded = ['id'];


    public function getRouteKeyName()
    {
        return 'title';
    }


    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
