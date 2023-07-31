<?php

namespace App\Models\Advertisement;

use App\Models\Article\Article;
use Illuminate\Database\Eloquent\Model;

class VideoAdvertisement extends Model
{
    protected $fillable = ['video', 'name'];
}
