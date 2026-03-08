<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'مورد العرب',
                'about_text' => 'نبذة تعريفية عن شركة مورد العرب ومجمع 120.',
                'phone' => '07700000000',
                'email' => 'info@example.com',
                'whatsapp' => '07700000000',
                'address' => 'العراق',
            ]
        );
    }
}
