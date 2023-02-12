<?php

namespace Database\Seeders;

use App\Models\Platfrom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatfromSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Shopee',
            'Lazada',
            'Tokopedia'
        ])->each(function ($platfrom) {
            Platfrom::create([
                'name' => $platfrom
            ]);
        });
    }
}
