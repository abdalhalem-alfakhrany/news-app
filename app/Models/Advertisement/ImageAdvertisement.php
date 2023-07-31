<?php

namespace App\Models\Advertisement;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class ImageAdvertisement extends Model
{
    protected $fillable = ['image', 'name'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
