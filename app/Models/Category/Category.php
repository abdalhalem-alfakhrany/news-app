<?php

namespace App\Models\Category;

use App\Models\Advertisement\ImageAdvertisement;
use App\Models\Article\Article;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = ['image'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function advertisements()
    {
        return $this->belongsToMany(ImageAdvertisement::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public static function createWithTranslaions(
        $image,
        $ar,
        $fr
    ) {
        $category = Self::create(['image' => $image]);

        foreach (['ar' => $ar, 'fr' => $fr] as $locale => $data) {
            CategoryTranslation::create([
                'locale' => $locale,
                'title' => $data['title'],
                'category_id' => $category->id,
            ]);
        }
        return $category;
    }

    public function updateTranslations(
        $ar,
        $fr
    ) {

        foreach (['ar' => $ar, 'fr' => $fr] as $locale => $data) {
            $this->updateTranslation($locale, $data);
        }
    }
}
