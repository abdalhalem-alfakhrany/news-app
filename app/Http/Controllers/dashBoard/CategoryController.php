<?php

namespace App\Http\Controllers\dashBoard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:category-create')->only(['create', 'store']);
        $this->middleware('permission:category-update')->only(['update', 'edit']);
        $this->middleware('permission:category-delete')->only(['destroy']);
        $this->middleware('permission:category-read')->only(['index']);
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

        $data = Category::limit($limit)->get(['id'])->map(function ($category) use ($locale) {

            $translation =  $category->TranslatedTo($locale, ['title'])->toArray();

            $collection = collect([
                $category->toArray(),
                $translation == null ? [] : $translation['0']
            ]);

            return $collection->collapse();
        })->toArray();

        return view(
            'components.crud.listData',
            ['data' => ($data == null) ? [] : $data, 'name' => 'category']
        );
    }

    public function create()
    {
        return view('dashBoard.categories.create');
    }

    public function store(Store $request)
    {
        $category = Category::createWithTranslaions(
            $this->storeMedia($request, 'categoriesImages', 'image'),
            $request['ar'],
            $request['fr'],
        );

        $category->advertisements()->sync(
            $request['advertisements']
        );

        return redirect(route('category.index'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view(
            'dashBoard.categories.edit',
            [
                'category' => $category,
                'ar' => $category
                    ->TranslatedTo('ar', ['title'])->first(),
                'fr' => $category
                    ->TranslatedTo('fr', ['title'])->first(),
                'category_advertisements' => $category->advertisements()->get(['id'])->map(function ($advertisement) {
                    return $advertisement['id'];
                })->toArray()
            ]
        );
    }

    public function update(Update $request, $id)
    {
        $category = Category::find($id);

        $this->updateMedia($request, $category->image, 'image', 'categoriesImages');

        $category->updateTranslations(
            $request['ar'],
            $request['fr'],
        );

        $category->advertisements()->sync(
            $request['advertisements']
        );

        return redirect(route('category.index'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $this->deleteMedia($category->image, 'categoriesImages');
        $category->deleteWithTranslations();

        return redirect(route('category.index'));
    }
}
