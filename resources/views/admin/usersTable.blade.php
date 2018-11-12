@extends('layouts.appAdmin')

@section('content')
<div class="app-title">
  <div>
    <h1><i class="fa fa-th-list"></i> Users table</h1>
    <p>Registered user on the website</p>
  </div>
  <ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Tables</li>
    <li class="breadcrumb-item active"><a href="#">Users table</a></li>
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
              <th>Name</th>
              <th>City</th>
              <th>Date of birth</th>
              <th>Registration date</th>
              <th>Tampering</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->sity }}</td>
                <td>{{ $user->date }}</td>
                <td>{{ date('m F H:i'), strtotime($user->created_at) }}</td>
                <td>
                  <ul class="center">
                    <li><a href=""><i class="fa fa-external-link" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                    <li><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></li>
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
