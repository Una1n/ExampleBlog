<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory()->create(['name' => 'UE5']);
        Tag::factory()->create(['name' => 'Laravel']);
        Tag::factory()->create(['name' => 'PHP']);
        Tag::factory()->create(['name' => 'Career']);
    }
}
