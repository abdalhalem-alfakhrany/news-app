<?php

namespace App\Models\Category;

use App\Models\Traits\TranslationUtils;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use TranslationUtils;
    public $timestamps = false;
    protected $fillable = ['title', 'locale', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
