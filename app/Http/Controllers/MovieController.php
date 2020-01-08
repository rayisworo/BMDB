<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Movie;
use App\Genre;
use App\Comment;
use Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movies = Movie::paginate(10);
        // $genres = Genre::all();

        // dd($movies[2]->genre);
        return view('home')->with([
            'movies' => $movies,
            // 'genres' => $genres
        ]);
    }

    public function manage(){
        $movies = Movie::paginate(10);
        return view('ManageMovies')->with([
            'movies' => $movies,
        ]);
    }

    public function view($id){
        $movie = Movie::find($id);
        $comments = Comment::where('movie_id',$id)->get();

        // dd($comments);

        return view('moviePage')->with([
            'movie' => $movie,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $genres = Genre::all();
        return view('addMovie')->with([
            'genres' => $genres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->hasFile('image'));
        // dd($request->get('genre'));
        $this->validate($request, [
            'title' => ['required',],
            'genre' => ['required',],
            'description' => ['required',],
            'rating' => ['required','numeric','between:0,10',],
            'image' => ['required','mimes:jpeg,png,jpg'],
        ]);
        // dd("berhasil");
        $movie = Movie::create([
            'user_id' => Auth::user()->user_id,
            'title'=> $request->get('title'),
            'genre_id'=> intval($request->get('genre')),
            'description'=> $request->get('description'),
            'rating'=> $request->get('rating'),
        ]);
            //save movie poster
        $extension = $request->file('image')->getClientOriginalExtension(); 
        $title = $movie->title;
        $words = explode(" ",strtoupper($title));
        $inisial = "";
        foreach($words as $n){
            $inisial .=$n[0];
        }
        $create_path = public_path('img/movie/');
        if(!File::isDirectory($create_path)){
            File::makeDirectory($create_path, 0777, true, true);
        }
        $file_name = 'movie'.$inisial.$movie->movie_id.'.'.$extension;
        $img = Image::make($request->file('image')->getRealPath());
        $img->save('img/movie/'.$file_name, 80);
        $movie->image = $file_name;
        $movie->save();

        return redirect()->route('manageMovies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // dd("berhasil");
        $movie = Movie::find($id);
        $genres = Genre::all();

        return view('updateMovie')->with([
            'movie' => $movie,
            'genres' => $genres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $movie = Movie::find($id);

        $this->validate($request, [
            'title' => ['required',],
            'genre' => ['required',],
            'description' => ['required',],
            'rating' => ['required','numeric','between:0,10',],
            'image' => ['required','mimes:jpeg,png,jpg'],
        ]);

        $movie->update($request->all());
            //save movie poster
        $extension = $request->file('image')->getClientOriginalExtension(); 
        $title = $movie->title;
        $words = explode(" ",strtoupper($title));
        $inisial = "";
        foreach($words as $n){
            $inisial .=$n[0];
        }
        $create_path = public_path('img/movie/');
        if(!File::isDirectory($create_path)){
            File::makeDirectory($create_path, 0777, true, true);
        }
        $file_name = 'movie'.$inisial.$movie->movie_id.'.'.$extension;
        $img = Image::make($request->file('image')->getRealPath());
        $img->save('img/movie/'.$file_name, 80);
        $movie->image = $file_name;
        $movie->save();
        
        return redirect()->route('manageMovies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $movie = Movie::find($id)->delete();

        return redirect()->route('manageMovies');
    }
}
