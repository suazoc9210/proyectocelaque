<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
//use App\Mail\CommentPostMail;
use Notificacion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CommentPostMail;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $newcomment = new Comment();
        $newcomment->comentario=$request->comment;
        $newcomment->post_id=$request->post_id;
        $newcomment->user_id=auth()->user()->id;
 

        $destino = User::find($request->idprop);


        $detalle=[

            'greeting'=>$request->propietario,
            'bodypost'=>$request->postp,
            'bodycomment' => $request->comment,
            'lastline' =>'Comentado por: '.auth()->user()->name,
        ];

        
        Notification::send($destino, new CommentPostMail($detalle));    
        
        //Mail::to($request->destino)->send(new CommentPost($detalle));  

        $newcomment->save(); 

        return redirect()->route('posts.index');
    }

    public function storex(Request $request)
    {
        $newcomment = new Comment();
        $newcomment->comentario=$request->comment;
        $newcomment->post_id=$request->post_id;
        $newcomment->user_id=auth()->user()->id;
        
        $destino1 = User::find($request->idprop);

        $detalle=[

            'greeting'=>$request->propietario,
            'bodypost'=>$request->postp,
            'bodycomment' => $request->comment,
            'lastline' =>'Comentado por: '.auth()->user()->name,
        ];

        
        Notification::send($destino1, new CommentPostMail($detalle));    
        
        //Mail::to($request->destino)->send(new CommentPost($detalle));  

        $newcomment->save();    
        
        return redirect()->route('posts.show',$request->post_id);
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
