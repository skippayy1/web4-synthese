<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = new Page();
        $page->title = 'About Us';
        $page->url = 'about-us';
        $page->views = 200;
        $page->save();

        $page = new Page();
        $page->title = 'jobs';
        $page->url = 'jobs';
        $page->views = 1000;
        $page->save();

        $page = new Page();
        $page->title = 'home';
        $page->url = 'home';
        $page->views = 3000;
        $page->save();
    }
}
