<?php

use App\Models\Advertisement\HomePageAdvertisement;
use App\Models\Advertisement\ImageAdvertisement;
use App\Models\Advertisement\VideoAdvertisement;
use App\Models\Article\Article;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    $data = [
        'advertisements' => HomePageAdvertisement::all()->map(function ($advertisement) {
            return ImageAdvertisement::where('id', $advertisement->image_advertisement_id)->get('image')->first()['image'];
        })->toArray(),
        'categoriesWithArticles' => Category::all()->map(function ($category) {
            return [
                'category' => $category->translatedTo(app()->getLocale(), 'title')->first()['title'],
                'articles' => Article::where('category_id', $category->id)->orderBy('id', 'DESC')->limit(4)->get()->map(function ($article) {
                    $translation = $article->translatedTo(app()->getLocale(), ['title', 'section1'])->first();
                    return [
                        'id' => $article->id,
                        'image' => $article->image,
                        'title' => $translation['title'],
                        'section1' => $translation['section1'],
                    ];
                }),
            ];
        })
    ];
    return view('web.index', $data);
})->name('index');

Route::get('/category/{id}', function ($id) {
    $category = Category::where('id', $id)->get()->first();
    $categoryArticles = $category->articles();
    $pages = ceil($categoryArticles->count() / 20);
    $newPage = request('page');

    $page =
        $newPage == ' '
        ? 1 : ($newPage < 1
            ? 1 : ($newPage > $pages
                ? $pages
                : $newPage));

    $data = [
        'pages' => $pages,
        'currentPage' => $page,
        'advertisements' => $category->advertisements()->get(['image'])->map(function ($advertisement) {
            return $advertisement['image'];
        })->toArray(),
        'articles' => $categoryArticles->skip(20 * ($page - 1))->take(20)->get()->map(function ($article) {
            $translation = $article->translatedTo(app()->getLocale(), ['title', 'section1'])->first();
            return [
                'id' => $article->id,
                'image' => $article->image,
                'title' => $translation['title'],
                'section1' => $translation['section1'],
            ];
        }),
        'category' => $id,
    ];

    return view('web.categoryPosts', $data);
})->name('category.show-posts');

Route::get('article/{id}', function ($id) {
    $article = Article::find($id);
    $translation = $article->translatedTo(app()->getLocale())->first();
    $advertisements = ImageAdvertisement::whereIn('id', [
        $article['top_advertisement'],
        $article['middle_advertisement'],
        $article['bottom_advertisement']
    ])->get()->map(function ($advertisement) {
        return $advertisement['image'];
    });

    $data = [
        'title' => $translation['title'],
        'section1' => $translation['section1'],
        'section2' => $translation['section2'],
        'section3' => $translation['section3'],
        'image' => $article['image'],
        'advertisementVideo' => VideoAdvertisement::find($article->video_advertisement_id)['video'] ?? "",
        'videoUrl' => $article['video_url'],
        'advertisements' => $advertisements
    ];
    return view('web.article', $data);
})->name('article.show');

Route::post('change-locale', function (Request $request) {
    Session::put('locale', $request['locale']);
    return redirect()->back();
})->name('changeLocale');

Auth::routes([
    'register' => false,
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);
