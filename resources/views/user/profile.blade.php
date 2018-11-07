@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-image: url('/storage/avatar/{{ $user->background }}'); background-repeat: no-repeat; background-size: cover; height: 120px">
                    <img src="/storage/avatar/{{ $user->avatar }}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; margin-top: 50px">
                </div>
                <div class="card-body" style="margin-top: -2%;">
                    <ul style="list-style-type: none; margin-left: 100px">
                        <li><h3>{{ $user->name }}</h3></li>
                        <form enctype="multipart/form-data" action="{{ route('post.store') }}" method="POST">
                            <li><input type="text" name="description" class="form-control" placeholder="Что нового?"></li>
                            <li><input type="file" name="image" style="width:100px"></li>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <li><button type="submit" style="float: right;" class="btn btn-default">Опубликовать</button></li>
                        </form>
                    </ul>
                </div>
            </div>
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">
                        @if($post->user_id == $user->id)
                            {{ $post->description }}
                            <ul class="navbar-nav ml-auto" style="float: right; margin-top: -2%;">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      <span class="caret">{{ $user->name }}</span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <li style="float:right">
                                            <form action="{{ route('post.edit', ['id'=>$post->id]) }}" method="GET">
                                                {{ csrf_field() }}
                                                <button type="submit" style="border: none; outline: none; background: none;">Редактировать</button>
                                            </form>
                                        </li>
                                        <li style="float:right">
                                            <form action="{{ route('post.destroy', ['id'=>$post->id]) }}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" style="border: none; outline: none; background: none;">Удалить</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <img src="/storage/image/{{ $post->image }}" style="width:100%">
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
