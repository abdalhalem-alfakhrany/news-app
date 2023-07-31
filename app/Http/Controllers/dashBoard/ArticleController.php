<?php

namespace App\Http\Controllers\dashBoard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\Store;
use App\Http\Requests\Article\Update;
use App\Models\Article\Article;
use App\Models\Category\Category;
use App\Models\User\User;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:article-create')->only(['create', 'store']);
        $this->middleware('permission:article-update')->only(['update', 'edit']);
        $this->middleware('permission:article-delete')->only(['destroy']);
        $this->middleware('permission:article-read')->only(['index']);
    }

    public function index()
    {
        /* locale */ {
            $locale = request('locale');
            $locale = !isset($locale) ? app()->getLocale() : $locale;
        }

        /* limit */ {
            $limit = request('limit');
            $limit = !isset($limit) ? '*' : $limit;
        }

        $data = Article::limit($limit)
            ->get(['id', 'video_url', 'category_id', 'publisher'])
            ->map(function ($article) use ($locale) {

                $translation =  $article->TranslatedTo($locale, [
                    'title',
                ])->toArray();

                $publisher = User::find($article['publisher']);
                $category = Category::find($article['category_id']);

                unset($article['publisher']);
                unset($article['category_id']);

                $collection = collect([
                    $article->toArray(),
                    [
                        'publisher' => $publisher->name,
                        'category' => $category->translatedTo($locale, ['title'])->first()['title']
                    ],
                    $translation == null ? [] : $translation['0']
                ]);

                return $collection->collapse();
            })->toArray();

        return view(
            'components.crud.listData',
            ['data' => ($data == null) ? [] : $data, 'name' => 'article']
        );
    }

    public function create()
    {
        return view('dashBoard.articles.create');
    }

    public function store(Store $request)
    {
        Article::createWithTranslaions(
            $request['category'],
            auth()->user()->id,
            $request['video_advertisemnet'],
            $this->storeMedia($request, 'articlesImages', 'image'),
            $request['video_url'],

            $request['top_advertisement'],
            $request['middle_advertisement'],
            $request['bottom_advertisement'],

            $request['ar'],
            $request['fr']
        );

        return redirect(route('article.index'));
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('dashBoard.articles.edit',
            [
                'article' => $article,
                'ar' => $article
                    ->TranslatedTo('ar', ['title', 'section1', 'section2', 'section3'])->first(),
                'fr' => $article
                    ->TranslatedTo('fr', ['title', 'section1', 'section2', 'section3'])->first(),
            ]
        );
    }

    public function update(Update $request, $id)
    {
        $article = Article::find($id);

        $this->updateMedia($request, $article->image, 'image', 'articlesImages');

        $article->updateWithTranslations(

            $request['category'],
            auth()->user()->id,

            $request['video_advertisement'],
            $request['video_url'],

            $request['top_advertisement'],
            $request['middle_advertisement'],
            $request['bottom_advertisement'],

            $request['ar'],
            $request['fr']
        );

        return redirect(route('article.index'));
    }

    public function destroy($id)
    {
        $article = Article::find($id);

        $this->deleteMedia($article->image, 'articlesImages');

        $article->deleteWithTranslations();

        return redirect(route('article.index'));
    }
}
