<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' => 'Camera']);
        Tag::create(['name' => 'Public']);
        Tag::create(['name' => 'School']);
        Tag::create(['name' => 'target']);
        Tag::create(['name' => 'leader']);
        Tag::create(['name' => 'developing']);
        Tag::create(['name' => 'teens']);
        Tag::create(['name' => 'rocketry']);
        Tag::create(['name' => 'challenge']);

    }
}
