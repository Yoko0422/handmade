<?php

use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
         $parts = [
            ['shop' => '1'],
            ];
            
        DB::table('part')->insert($parts);
    }
}
