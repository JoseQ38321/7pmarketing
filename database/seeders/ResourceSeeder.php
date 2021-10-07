<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\File;
use App\Models\Resource;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');

        Storage::makeDirectory('posts', 0755, true);

        Resource::factory(100)->create()->each(function ($post) {
            $post->categories()->sync(Category::all()->random()->id);
            $post->image()->sync(File::all()->random()->id);
            $post->seo()->create();
        });
    }
}
