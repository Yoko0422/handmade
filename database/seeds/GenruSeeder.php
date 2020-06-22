<?php

use Illuminate\Database\Seeder;

class GenruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $genrus = [
            ['name' => '布'],
            ['name' => 'ビーズ'],
            ['name' => 'メタル'],
            ];
        DB::table('genrus')->insert($genrus);
    }
}
