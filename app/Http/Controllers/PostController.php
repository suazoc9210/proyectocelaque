<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Notifications\Notifiable;

use Illuminate\support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        $posts=Post::with('comments')->latest()->where('user_id',auth()->user()->id)->latest()->get();
        return view('posts.index',compact('posts'));
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
        
        $request->validate([
            'file' => 'image'
        ]);

        if (null!==($request->file('file'))){
            $nombre = Str::random(10).$request->file('file')->getClientOriginalName();
            $ruta = storage_path() . '\app\public\postimg/'.$nombre;

            Image::make($request->file('file'))
                ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
                })
                ->save($ruta);     

            $newpost = new Post();
            $newpost->post=$request->post;
            $newpost->user_id=auth()->user()->id;
            $newpost->image ='/storage/postimg/'.$nombre;
            $newpost->save();  
            return redirect()->route('posts.index');     
        }
        // $imagen = $request->file('file')->store('public/postimg');
        // $url = Storage::url($imagen);

            $newpost = new Post();
            $newpost->post=$request->post;
            $newpost->user_id=auth()->user()->id;
            //$newpost->image ='/storage/postimg/'.$nombre;
            $newpost->save();  
            return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show',compact('post'));
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
