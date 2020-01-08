<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(10);
        // dd("berhasil");
        return view('ProfilesPage')->with([
            'users' => $users,
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
        $user = User::find($id);
        // dd("berhasil");
        return view('editProfile')->with([
            'user'=>$user,
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
        $user = User::find($id);
        // dd($user->user_id);  
        $this->validate($request, [
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users','user_id')->ignore($user->id),],
            'password' => ['required', 'string', 'min:6', 'confirmed', 'alpha_num'],
            'image' => ['required','mimes:jpeg,png,jpg'],
            'gender' => ['required'],
            'address' => ['required'],
            'dob ' => ['date'],
        ]);

        $user->update($request->all());
        $extension = $request->file('image')->getClientOriginalExtension(); 
        $name = $user->fullname;
        $names = explode(" ",strtoupper($name));
        $inisial = "";
        foreach($names as $n){
            $inisial .=$n[0];
        }
        $create_path = public_path('img/profile/');
        if(!File::isDirectory($create_path)){
            File::makeDirectory($create_path, 0777, true, true);
        }
        $file_name = 'pp'.$inisial.$user->user_id.'.'.$extension;
        $img = Image::make($request->file('image')->getRealPath());
        $img->save('img/profile/'.$file_name, 80);
        $user->profilePicture = $file_name;
        $user->save();
        
        return redirect()->route('profile');

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
    }
}
