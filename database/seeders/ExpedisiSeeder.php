<?php

namespace Database\Seeders;

use App\Models\Expedisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpedisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expedisi = collect([
            'Jne',
            'J&t',
            'Sicepat',
            'Shopee express',
            'Lel express',
            'Ninja express'
        ]);

        $expedisi->each(function ($exped) {
            Expedisi::create([
                'name' => $exped
            ]);
        });
    }
}
