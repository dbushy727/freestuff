<?php

use App\Model\ListingImage;
use App\Model\Listing;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $this->seedListings($faker);
        $this->seedImages($faker);
    }

    protected function seedListings($faker)
    {
        foreach (range(1,10) as $index) {
            $name = $faker->word;

            Listing::create([
                'name'         => $name,
                'slug'         => str_slug($name),
                'zip_code'     => $faker->postcode,
                'description'  => $faker->paragraph,
                'is_active'    => !!rand(0,1),
                'published_at' => Carbon::now(),
            ]);
        }
    }

    protected function seedImages($faker)
    {
        Listing::all()->each(function ($listing) use ($faker) {
            ListingImage::create([
                'listing_id' => $listing->id,
                'path'       => $faker->imageUrl(300,300),
            ]);
        });
    }
}
