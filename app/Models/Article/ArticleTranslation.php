<?php

namespace App\Models\Article;

use App\Models\Traits\TranslationUtils;
use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    use TranslationUtils;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'section1',
        'section2',
        'section3',
        'locale',
        'article_id'
    ];
}
