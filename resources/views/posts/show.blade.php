@extends('adminlte::page')

@section('title', 'CELAQUE SOCIAL')

@section('content_header')

@stop

@section('content')
    <div class="row">
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-body">
                    <strong class="d-block">Este es un post de {{$post->user->name}}</strong>
                        <p class="lead" align="center"><strong>{{$post->post}}</strong></p>
                        <p align="center"><img src="{{$post->image}}" alt="" class="img-fluid" ></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('storex')}}" method="POST">
                @csrf
                <div class="form-gruop">
                    <input type="text" name="comment" placeholder="Escribe un comentario" class="form-control" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input type="hidden" name="destino" value="{{$post->user->email}}">
                    <input type="hidden" name="propietario" value="{{$post->user->name}}">
                    <input type="hidden" name="postp" value="{{$post->post}}">
                    <input type="hidden" name="idprop" value="{{$post->user->id}}">
                    
                </div>                
                <div class="form my-3">
                    <button type="submit" class="btn btn-outline-success btn-sm">Comentar</button>
                </div>
                    <div>
                    <div class="row">
                        <div class="col-12">
                        @forelse($post->comments as $comment)
                        <div class="card">
                            <div class="card-body">
                                <p class='card-text'>{{$comment->comentario}}</p>
                                <p><strong>{{$comment->user->name}}</strong></p>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                        @empty
                        @endforelse
                        </div>
                    </div>
                    </div>                
            </form>
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