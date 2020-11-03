<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $tags = \App\Models\Tag::factory(5)->create();
        $articles = \App\Models\Article::factory(20)->create();

        $tags_id = $tags->pluck('id');

        // dd($tags_id );

         $articles->each(function ($a) use ($tags_id) {
        	$a->tags()->attach($tags_id->random(3));
    		});
    }
}
