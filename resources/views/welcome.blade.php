@extends('layouts.app')

@section('title')
  News
@endsection

@section('content')
<div class="row user">
      <div class="col-md-12">
      </div>
      <div class="col-md-3">
        <div class="tile p-0">
          <ul class="nav flex-column nav-tabs user-tabs">
            <li class="nav-item"><a class="nav-link active" href="#user-posts" data-toggle="tab">News</a></li>
            @guest
            @else
              <li class="nav-item"><a class="nav-link" href="#user-create-post" data-toggle="tab">Create post</a></li>
            @endguest
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          @foreach($posts as $post)
              @foreach($users as $user)
                @if($user->id == $post->user_id)
                  <div class="timeline-post">
                    <div class="dropdown" style="float: right;">
                      @if($auth_user->id == $user->id)
                      <a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                      <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li>
                          <form action="{{ route('post.edit', ['id'=>$post->id]) }}" method="GET">
                              {{ csrf_field() }}
                              <button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-pencil"></i> Edit</button>
                          </form>
                        </li>
                        <li>
                          <form action="{{ route('post.destroy', ['id'=>$post->id]) }}" method="POST">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <li><button type="submit" class="dropdown-item" style="border: none; outline: none; background: none;"><i class="fa fa-trash"></i> Remove</a></button></li>
                          </form>
                        </li>
                      </ul>
                      @endif
                    </div>

                    <div class="post-media"><a href="#"><img class="img" src="img/default.png"></a>
                      <div class="content">
                        <h5><a href="#">{{ $user->name }} {{ $user->surname }}</a></h5>
                        <p class="text-muted"><small>2 January at 9:30</small></p>
                      </div>
                    </div>
                    <div class="post-content">
                      <hr/>
                      <p>{{ $post->description }}</p>
                      <img src="/storage/image/{{ $post->image }}" style="width:100%">
                    </div>
                    <ul class="post-utility">
                      <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                      <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                      <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                    </ul>
                  </div>
                </div>
              @endif
            @endforeach
          @endforeach
          @guest
          @else
            <div class="tab-pane fade" id="user-create-post">
              <div class="tile user-create-post">
                <h4 class="line-head">Create post</h4>
                <form>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label for="exampleTextarea">Example textarea</label>
                      <textarea class="form-control" id="exampleTextarea" rows="2"></textarea>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label for="exampleInputFile">Image input</label>
                      <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          @endguest
        </div>
      </div>
    </div>
@endsection
