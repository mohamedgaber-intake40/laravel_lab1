@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Posted by</th>
            <th scope="col">Created At</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title}}</td>
                    <td>{{ $post->user_id}}</td>
                    <td>{{ $post->created_at}}</td>
                    <td><button class="btn btn-danger">delete</button></td>
                    <td><button class="btn btn-danger">delete</button></td>
                    <td><button class="btn btn-danger">delete</button></td>
                </tr>      
          @endforeach
        </tbody>
      </table>
</div>
@endsection
