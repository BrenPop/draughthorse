<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barTypes = [
            [
                "name" => "Pub",
                "slug" => "pub",
                "description" => "A casual establishment serving primarily beer, often with a selection of other alcoholic beverages and simple food options."
            ],
            [
                "name" => "Sports Bar",
                "slug" => "sports-bar",
                "description" => "A bar focused on televising sporting events, often equipped with multiple screens, serving beer, cocktails, and typical bar food."
            ],
            [
                "name" => "Wine Bar",
                "slug" => "wine-bar",
                "description" => "Specializes in serving a variety of wines, often with a selection of cheese, charcuterie, and other small plates."
            ],
            [
                "name" => "Cocktail Bar",
                "slug" => "cocktail-bar",
                "description" => "Known for its craft cocktails, often featuring unique and creative drink recipes made with premium spirits and fresh ingredients."
            ],
            [
                "name" => "Dive Bar",
                "slug" => "dive-bar",
                "description" => "A no-frills, unpretentious bar typically characterized by its inexpensive drinks, casual atmosphere, and eclectic clientele."
            ],
            [
                "name" => "Tiki Bar",
                "slug" => "tiki-bar",
                "description" => "Inspired by Polynesian culture, serves tropical cocktails often garnished with fruits and umbrellas, with a decor featuring bamboo, thatch, and tiki masks."
            ],
            [
                "name" => "Speakeasy",
                "slug" => "speakeasy",
                "description" => "Emulates the clandestine bars of the Prohibition era, often accessed through hidden entrances, serving classic cocktails in a dimly lit, retro atmosphere."
            ],
            [
                "name" => "Brewpub",
                "slug" => "brewpub",
                "description" => "A bar that brews its own beer on-site, offering a selection of house-made brews alongside other beverages and food."
            ],
            [
                "name" => "Karaoke Bar",
                "slug" => "karaoke-bar",
                "description" => "Features private karaoke rooms or a stage where patrons can perform karaoke while enjoying drinks."
            ],
            [
                "name" => "Hotel Bar",
                "slug" => "hotel-bar",
                "description" => "Located within a hotel, offering a range of drinks and often catering to both guests and locals with a comfortable ambiance."
            ],
            [
                "name" => "Theme Bar",
                "slug" => "theme-bar",
                "description" => "Themed around a specific concept or era, offering drinks, decor, and sometimes entertainment that aligns with the theme."
            ],
            [
                "name" => "Gay Bar",
                "slug" => "gay-bar",
                "description" => "A bar primarily catering to the LGBTQ+ community, offering a safe and inclusive space for socializing and entertainment."
            ],
            [
                "name" => "Irish Pub",
                "slug" => "irish-pub",
                "description" => "Modeled after traditional Irish pubs, characterized by dark wood furnishings, a cozy atmosphere, and a focus on Irish beers, whiskey, and hearty food."
            ],
            [
                "name" => "Martini Bar",
                "slug" => "martini-bar",
                "description" => "Specializes in serving a variety of martinis, often with a sophisticated ambiance and a focus on classic cocktail culture."
            ],
            [
                "name" => "Rooftop Bar",
                "slug" => "rooftop-bar",
                "description" => "Located on the roof of a building, offering panoramic views of the surrounding area along with drinks and sometimes light fare."
            ]
        ];

        DB::table('bar_types')->insert($barTypes);
    }
}
