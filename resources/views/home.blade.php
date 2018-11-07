@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">News</div>
            </div>
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">
                            {{ $post->description }}
                            <ul class="navbar-nav ml-auto" style="float: right; margin-top: -1.5%;">
                                @foreach($users as $user)
                                  <li class="nav-item dropdown">
                                      @if($user->id == $post->user_id)
                                          @if($auth_user->id == $user->id)
                                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; padding-left:50px; color: black">
                                              <img src="/storage/avatar/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%; margin-top:-8px;">
                                              <span>
                                                      {{ $user->name }}
                                              </span>
                                          </a>
                                          @else
                                          <a class="nav-link" style="position:relative; padding-left:50px; margin-right:18px">
                                              <img src="/storage/avatar/{{ $user->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%; margin-top:-8px;">
                                              <span>{{ $user->name }}</span>
                                          </a>
                                          @endif
                                      @endif
                                      @if($auth_user->id == $post->user_id)
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
                                      @endif
                                  </li>
                                @endforeach
                            </ul>
                            <hr/>
                            <img src="/storage/image/{{ $post->image }}" style="width:100%">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
