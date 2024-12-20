<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Feature::create([
            'title' => 'Best In Industry',
            'description' => 'Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos diam dolor',
            'icon' => 'fa fa-cubes text-white',
        ]);

        Feature::create([
            'title' => '99% Success Rate',
            'description' => 'Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos diam dolor',
            'icon' => 'fa fa-percent text-white',
        ]);
        Feature::create([
            'title' => 'Award Winning',
            'description' => 'Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos diam dolor',
            'icon' => 'fa fa-award text-white',
        ]);
        Feature::create([
            'title' => '100% Happy Client',
            'description' => 'Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos diam dolor',
            'icon' => 'fa fa-smile-beam text-white',
        ]);
        Feature::create([
            'title' => 'Professional Advisors',
            'description' => 'Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos diam dolor',
            'icon' => 'fa fa-user-tie text-white',
        ]);
        Feature::create([
            'title' => '24/7 Customer Support',
            'description' => 'Magna sea eos sit dolor, ipsum amet ipsum lorem diam eos diam dolor',
            'icon' => 'fa fa-headset text-white',
        ]);
    }
}
