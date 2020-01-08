<?php

use Illuminate\Database\Seeder;
use App\Movie;
use App\User;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::all();
        $movies = Movie::all();

        $countU = sizeof($users);
        $countM = sizeof($movies);

        for($i=0; $i<10; $i++){
            $user = $users[rand(0,$countU-1)];
            $movie = $movies[rand(0,$countM-1)];

            Comment::create([
                'user_id'=>$user->user_id,
                'movie_id'=>$movie->movie_id,
                'comment' => 'comment utk film '.$movie->movie_id.' dari user '.$user->fullname,
            ]);

        }
    }
}
