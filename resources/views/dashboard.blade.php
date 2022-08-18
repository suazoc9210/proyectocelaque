@extends('adminlte::page')

@section('title', 'CELAQUE SOCIAL')

@section('content_header')
    <h1>INICIO</h1>
@stop

@section('content')
<body>
    <div class="row">
        <div class="col-12">
            @forelse($posts as $post)
                <div class="card border-success mb-3">
                    <div class="card-body py-1">
                        <div class="card-header bg-transparent border-success">
                        <h3><strong class="d-block" align="center">{{$post->user->name}}</strong></h3>
                        </div>
                        <div class='my-2'>
                            <p class="lead" align="center"><a href="{{route('posts.show',$post->id)}}" class="card-text lead my-3">
                            {{$post->post}}
                            </a></p>
                        </div>
                        <div class='my-2'>
                        <p align="center"><img src="{{$post->image}}" alt="" class="img-fluid" ></p>
                        </div>
                    </div>
                    <div class="card-footer border-success">
                        <div class="row">
                            <div class="col-4">
                                {{$post->created_at->diffForhumans()}}
                            </div>
                            <div class="col-3">
                                Comentarios:{{$post->comments->count()}}
                            </div>
                            <div class="col-1">
                                Likes:0
                            </div>
                            <div class="col-1">
                                <form action="" method="">
                                    
                                    <button type="" class="btn btn-outline-success btn-sm text-body">Me gusta</button>
                            
                                </form>
                            </div>
                            <div class="col-2">
                                <form action="">
                                    
                                    <button type="" class="btn btn-outline-warning btn-sm text-body">Ya no me gusta</button>
                            
                                </form>
                            </div>
                    </div>
                </div> 
                </div> 
            @empty
            @endforelse
      </div>
    </div>
</body>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop