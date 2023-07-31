<?php

namespace App\Models\Article;

use App\Models\Advertisement\VideoAdvertisement;
use App\Models\Traits\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasTranslations;

    protected $fillable = [
        'category_id',
        'publisher',
        'video_advertisement_id',
        'image',
        'video_url',
        'top_advertisement',
        'middle_advertisement',
        'bottom_advertisement'
    ];

    public function translations()
    {
        return $this->hasMany(ArticleTranslation::class);
    }

    public static function createWithTranslaions(
        $category,
        $publisher,
        $video_advertisement,
        $image,
        $video_url,
        $top_advertisement,
        $middle_advertisement,
        $bottom_advertisement,
        $ar,
        $fr
    ) {
        $article  = Self::create([
            'category_id' => $category,
            'publisher' => $publisher,
            'video_advertisement_id' => $video_advertisement,
            'image' => $image,
            'video_url' => $video_url,
            'top_advertisement' => $top_advertisement,
            'middle_advertisement' => $middle_advertisement,
            'bottom_advertisement' => $bottom_advertisement,
        ]);

        foreach (['ar' => $ar, 'fr' => $fr] as $locale => $data) {
            ArticleTranslation::create([
                'locale' => $locale,
                'article_id' => $article->id,
                'title' =>    $data['title'],
                'section1' => $data['section1'],
                'section2' => $data['section2'],
                'section3' => $data['section3'],
            ]);
        }
        return $article;
    }


    public function updateWithTranslations(
        $category,
        $publisher,

        $video_advertisement,
        $video_url,

        $top_advertisement,
        $middle_advertisement,
        $bottom_advertisement,

        $ar,
        $fr
    ) {
        $this->update([
            'category_id' => $category,
            'publisher' => $publisher,
            'video_advertisement_id' => $video_advertisement,
            'video_url' => $video_url,
            'top_advertisement' => $top_advertisement,
            'middle_advertisement' => $middle_advertisement,
            'bottom_advertisement' => $bottom_advertisement,
        ]);

        foreach (['ar' => $ar, 'fr' => $fr] as $locale => $data) {
            $this->updateTranslation($locale, $data);
        }
    }
}
