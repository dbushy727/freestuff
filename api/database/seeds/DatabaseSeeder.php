<?php

use App\Model\Listing;
use App\Model\ListingImage;
use App\Model\User;
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
        CLImate::info('Starting Seed');

        $faker = Faker::create();
        $this->seedUsers();
        $this->seedListings($faker);
        $this->seedImages($faker);

        CLImate::info('Seed Completed');
    }

    protected function seedUsers()
    {
        User::create([
            "name"             => "Danny Bushkanets",
            "email"            => "dbushy727@gmail.com",
            "facebook_id"      => "10209467596871110",
            "facebook_token"   => "EAAAAIT69HQABAPNVopyF9JOo6zyvPAguQlUBQgf0sesPBd4YH9WmEYNVzMQEJDVBfxesqCs91cYKpKeXFiZCoiFrBwg8asldIpSzlbg7Fqoow4NZC2NVr3S3hi5rhTZBztZAwYWhZB1KwaV4jZC4R2WODwvZAZBggXsZD",
            "facebook_avatar"  => "https://graph.facebook.com/v2.9/10209467596871110/picture?type=normal",
            "facebook_profile" => "https://www.facebook.com/app_scoped_user_id/10209467596871110/",
            "created_at"       => "2017-05-29 22:20:14",
            "updated_at"       => "2017-05-29 22:22:58"
        ]);
    }

    protected function seedListings($faker)
    {
        foreach (range(1,10) as $index) {
            $name = $faker->word;

            Listing::create([
                'user_id'      => User::first()->id,
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
