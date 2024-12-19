<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'Business Research',
            'description' => 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.',
            'icon' => 'fa fa-user-tie fa-2x',
        ]);

        Service::create([
            'title'=>'Stretagic Planning',
            'description'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.',
            'icon'=>'fa fa-chart-pie fa-2x',
        ]);
        Service::create([
            'title'=>'Market Analysis',
            'description'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.',
            'icon'=>'fa fa-chart-line fa-2x',
        ]);
        Service::create([
            'title'=>'Financial Analaysis',
            'description'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.',
            'icon'=>'fa fa-chart-area fa-2x',
        ]);
        Service::create([
            'title'=>'legal Advisory',
            'description'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.',
            'icon'=>'fa fa-balance-scale fa-2x',
        ]);
        Service::create([
            'title'=>'Tax & Insurance',
            'description'=>'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.',
            'icon'=>'fa fa-house-damage fa-2x',
        ]);
    }

}
