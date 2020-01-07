<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0; $i<5; $i++){
            Genre::create([
                'name'=>'genre '.$i,                
            ]);
        }
    }
}
