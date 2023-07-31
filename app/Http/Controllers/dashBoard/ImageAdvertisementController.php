<?php

namespace App\Http\Controllers\dashBoard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Adervtisement\image\Store;
use App\Http\Requests\Adervtisement\image\Update;

use App\Models\Advertisement\ImageAdvertisement;
use Illuminate\Support\Facades\Storage;

class ImageAdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:advertisement-create')->only(['create', 'store']);
        $this->middleware('permission:advertisement-update')->only(['update', 'edit']);
        $this->middleware('permission:advertisement-delete')->only(['destroy']);
        $this->middleware('permission:advertisement-read')->only(['index']);
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

        $data = ImageAdvertisement::limit($limit)->get(['id', 'name'])->toArray();
        return view('components.crud.listData', ['data' => $data, 'name' => 'image-advertisement']);
    }

    public function store(Store $request)
    {
        ImageAdvertisement::create([
            'image' => $this->storeMedia($request, 'advertisementsImages', 'image'),
            'name' => request('name')
        ]);

        return redirect(route('image-advertisement.index'));
    }

    public function edit($id)
    {
        $data = ImageAdvertisement::find($id);
        return view('dashBoard.advertisements.image.edit', compact('data'));
    }

    public function update(Update $request, $id)
    {
        $advertisement = ImageAdvertisement::find($id);
        $advertisement->update(['name' => $request['name']]);
        $this->updateMedia($request, $advertisement->image, 'image', 'advertisementsImages');

        return redirect(route('image-advertisement.index'));
    }

    public function destroy($id)
    {
        $advertisement = ImageAdvertisement::find($id);

        $this->deleteMedia($advertisement->image, 'advertisementsImages');

        $advertisement->delete();

        return redirect(route('image-advertisement.index'));
    }
}
