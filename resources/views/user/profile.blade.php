@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-image: url('/storage/avatar/{{ $user->background }}'); background-repeat: no-repeat; background-size: cover; height: 120px">
                    <ul style="list-style-type: none; margin-top: 50px; margin-left: -30px">
                        <li style="margin-right: 100px"><img src="/storage/avatar/{{ $user->avatar }}" style="width:120px; height:120px; border-radius:50%; "></li>
                        <li><a>Сменить фото:<input type="hidden" style="opacity: 0;" name="image" style="width:100px"></a></li>
                    </ul>
                </div>
                <div class="card-body" style="margin-top: -2%;">
                    <ul style="list-style-type: none; margin-left: 100px">
                        <li><h3>{{ $user->name }}</h3></li>
                        <form enctype="multipart/form-data" action="{{ route('post.store') }}" method="POST">
                            <li><input type="text" name="description" class="form-control" placeholder="Что нового?"></li>
                            <li style="margin-left: 504px; margin-top: -6.7%">
                                <div style="width: 44px; height: 36px; background: #afb9c5; border-radius: 5px; padding-left: 10px;">
                                  <h2 style="padding-left: 4px">+<input type="file" style="opacity: 0;  width:10px; position: absolute; margin-left:-27px;" name="image"></h2>
                                </div>
                            </li>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <li><button type="submit" style="float: right; margin-top: 1%; background: #afb9c5;" class="btn btn-default">Опубликовать</button></li>
                        </form>
                    </ul>
                </div>
            </div>
            @foreach($posts as $post)
              @if($post->user_id == $user->id)
                <div class="card">
                    <div class="card-body">
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
                    </div>
                </div>
                @endif
            @endforeach

        </div>
    </div>
</div>
@endsection
