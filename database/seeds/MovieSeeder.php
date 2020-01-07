<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Genre;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $genres = Genre::all();
        $count = sizeof($genres);

        for($i=0; $i<11; $i++){
            $genre = $genres[rand(0,$count-1)]; 
            Movie::create([
                'title' => 'movie title'.$i,
                'genre_id' => $genre->genre_id,
                'description' => 'description'.$i,
                'rating' => rand(0,10),
                'image'=>'ppR2.png',                
            ]);
        }
    }
}
