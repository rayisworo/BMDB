<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\Genre;
use App\User;

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
        $users = User::all();
        $countU = sizeof($users);

        for($i=0; $i<11; $i++){
            $genre = $genres[rand(0,$count-1)]; 
            $user = $users[rand(0,$countU-1)];
            Movie::create([
                'user_id' => $user->user_id,
                'title' => 'movie title'.$i,
                'genre_id' => $genre->genre_id,
                'description' => 'description'.$i,
                'rating' => rand(0,10),
                'image'=>'ppA14.png',                
            ]);
        }
    }
}
