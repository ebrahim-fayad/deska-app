<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
// use Spatie\Sluggable\SlugOptions;
class Testmonial extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
//      public function getSlugOptions() : SlugOptions
//     {
//         return SlugOptions::create()
//             ->generateSlugsFrom('name')
//             ->saveSlugsTo('slug');
//     }
//     public function getRouteKeyName()
//     {
//         return 'slug';
//     }
}
