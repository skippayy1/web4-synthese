<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partner = new Partner();
        $partner->name = 'TIM';
        $partner->logo = '/img/partners/LogoTim.png';
        $partner->link = 'https://tim-cstj.ca/';
        $partner->save();
    }
}
