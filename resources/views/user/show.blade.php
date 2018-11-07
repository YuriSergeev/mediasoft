@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body" style="margin-top: -2%;">
                    <ul style="list-style-type: none; margin-left: -5%">
                        <form enctype="multipart/form-data" action="{{ route('post.update', $post->id) }}" method="POST">
                            <lable>Что нового?:</label>
                            <li><input type="text" name="description" class="form-control" value="{{ $post->description }}"></li>
                            <img src="/storage/image/{{ $post->image }}" style="width:100%">
                            <li><input type="file" name="image"></li>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <li><button type="submit" style="float: right;" class="btn btn-default">Опубликовать</button></li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
