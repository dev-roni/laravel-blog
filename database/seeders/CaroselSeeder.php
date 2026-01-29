<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carosel;

class CaroselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Carosel::insert([
            [
                'categories_id'=>'1',
                'carosel_select'=>'first'
            ],
            [
                'categories_id'=>'2',
                'carosel_select'=>'second'
            ],
            [
                'categories_id'=>'4',
                'carosel_select'=>'third'
            ],
        ]);
    }
}
