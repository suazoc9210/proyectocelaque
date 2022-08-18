@extends('adminlte::page')

@section('title', 'CELAQUE SOCIAL')

@section('content_header')
    <h1>MIS POSTS</h1>
@stop

@section('content')
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Nuevo Post</h5>
                </div>  
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p class="lead">Que estas pensando {{auth()->user()->name}}?</p>
                        </div>
                    </div>
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                            <textarea name="post" class="form-control" placeholder="¿Qué estas pensando?" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"> Publicar </button>
                            <input type="file" name="file" id="" accept="image/*">
                            @error('file')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            @forelse($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <p class="lead" align="center"><strong>{{$post->post}}</strong></p>
                        <p align="center"><img src="{{$post->image}}" alt="" class="img-fluid" ></p>
                        <hr>
                        <form action="{{route('comments.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment" placeholder="Escribe un comentario" class="form-control" autocomplete="off" required>

                                <hr>
                                @forelse($post->comments as $comment)
                                <div class="card">
                                    <div class="card-body py-1">
                                        <p class="card-text lead my-0">{{$comment->comentario}}</p>

                                        <div class="row">
                                            <div class="col-6">
                                            <small>{{$comment->user->name}}</small>        
                                            </div>
                                            <div class="col-6">
                                            <small>{{$comment->created_at->diffForHumans()}}</small> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <input type="hidden" name="destino" value="{{$post->user->email}}">
                                <input type="hidden" name="propietario" value="{{$post->user->name}}">
                                <input type="hidden" name="postp" value="{{$post->post}}">
                                <input type="hidden" name="idprop" value="{{$post->user->id}}">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="row">
                            <div class="col-4"><small>{{$post->created_at->diffForHumans()}}</small></div>
                            <div class="col-4"><small "fa-solid fa-comment-captions">
                                Comentarios {{$post->comments->count()}}</small></div>
                            <div class="col-4"><small>Like: 45</small></div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop