<?php

namespace Database\Seeders;

use App\Models\Advertisement\ImageAdvertisement;
use App\Models\Advertisement\VideoAdvertisement;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    public function run()
    {
        $imageAdvertisements = [
            'EgX95ioIcnqarep1C3s02cxxRiqtO2AckGdGV3oS.jpg',
            'GkrN1N9gViFhDTsAztHAU8JoE86p9MtJYuMDvC7p.jpg'
        ];

        $videoAdvertisements = [
            'TpmB8ekeIL3VE0r4HtfLjmVjnRMGaeltZAFYFXco.mp4',
            'ZDvD5yXTVanD01W1u3OER0WTRHK0GTCb0g4rDDjF.mp4'
        ];

        for ($i = 1; $i < 11; $i++) {

            ImageAdvertisement::create([
                'image' => $imageAdvertisements[rand(0, 1)],
                'name' => 'image advertisement no' . $i
            ]);

            VideoAdvertisement::create([
                'video' => $videoAdvertisements[rand(0, 1)],
                'name' => 'video advertisement no' . $i
            ]);
        }
    }
}
