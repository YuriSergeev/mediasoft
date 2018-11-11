@extends('layouts.appAdmin')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-th-list"></i> Posts table</h1>
    <p>All posts made on the site</p>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active"><a href="#">Posts table</a></li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <table class="table table-hover table-bordered" id="sampleTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Description</th>
              <th>User</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{ $post->id }}</td>
              <td><img style="width:180px" src="/storage/image/{{ $post->image }}"></td>
              <td>{{ $post->description }}</td>
              @foreach($users as $user)
                @if($user->id == $post->user_id)
                  <td>{{ $user->name }}</td>
                @endif
              @endforeach
              <td>{{ date('m F H:i'), strtotime($post->created_at) }}</td>
              <td>
                <ul class="center">
                  <li><a href=""><i class="fa fa-external-link" aria-hidden="true"></i></a></li>
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
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
