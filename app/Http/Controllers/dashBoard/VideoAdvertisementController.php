<?php

namespace App\Http\Controllers\dashBoard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Adervtisement\video\Store;
use App\Http\Requests\Adervtisement\video\Update;

use App\Models\Advertisement\VideoAdvertisement;
use Illuminate\Support\Facades\Storage;

class VideoAdvertisementController extends Controller
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

        $data = VideoAdvertisement::limit($limit)->get(['id', 'name'])->toArray();
        return view('components.crud.listData', ['data' => $data, 'name' => 'video-advertisement']);
    }

    public function store(Store $request)
    {
        VideoAdvertisement::create(['video' => $this->storeMedia($request, 'advertisementsVideos', 'video'), 'name' => request('name')]);

        return redirect(route('video-advertisement.index'));
    }

    public function edit($id)
    {
        $data = VideoAdvertisement::find($id);
        return view('dashBoard.advertisements.video.edit', compact('data'));
    }

    public function update(Update $request, $id)
    {
        $advertisement = VideoAdvertisement::find($id);

        $this->updateMedia($request, $advertisement->video, 'video', 'advertisementsVideos');

        $advertisement->update(['name' => $request['name']]);

        return redirect(route('video-advertisement.index'));
    }

    public function destroy($id)
    {
        $advertisement = VideoAdvertisement::find($id);
        $this->deleteMedia($advertisement->video, 'advertisementsVideos');
        $advertisement->delete();

        return redirect(route('video-advertisement.index'));
    }
}
