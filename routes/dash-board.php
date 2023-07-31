<?php

use App\Models\Advertisement\HomePageAdvertisement;
use App\Models\Advertisement\ImageAdvertisement;
use Illuminate\Support\Facades\Route;

Route::view('', 'dashBoard.index')->name('dash-board.index');

Route::resource('article', 'ArticleController')->except('show');
Route::resource('category', 'CategoryController')->except('show');

Route::get('create-advertisement', function () {
    return view('dashBoard.advertisements.create');
})->name('advertisement.create');

Route::resource('image-advertisement', 'ImageAdvertisementController')->except(['show', 'create']);
Route::resource('video-advertisement', 'VideoAdvertisementController')->except(['show', 'create']);

Route::prefix('home-page-advertisement')->group(function () {
    Route::get('add/{advertisementID}', function ($advertisementID) {
        HomePageAdvertisement::create(['image_advertisement_id' => $advertisementID]);
    })->name('home-page.add');
    Route::get('remove/{advertisementID}', function ($advertisementID) {
        HomePageAdvertisement::where('image_advertisement_id', $advertisementID)->delete();
    })->name('home-page.remove');
    Route::get('/', function () {
        $advertisements = ImageAdvertisement::all(['id', 'name', 'image'])->map(function ($advertisement) {
            return [
                'id' => $advertisement->id,
                'name' => $advertisement->name,
                'image' => $advertisement->image,
                'added' => (HomePageAdvertisement::where('image_advertisement_id', $advertisement->id)->count() >= 1) ? true : false
            ];
        })->toArray();
        return view('dashBoard.advertisements.homePage.index', compact('advertisements'));
    })->name('home-page-advertisement.index');
});

Route::resource('user', 'UserController')->except('show')->middleware('auth');

Route::view('test', 'test');
