@extends('layouts.app')
@section('content')
<div class="container">
    <form class="m-5 myform" method="POST" action='{{ route('posts.update',['post'=> $post->id]) }}'>
        @csrf
        @method('put')
        <div class="form-group">
          <label >Title</label>
          <input type="text" name='title' class="form-control" value='{{$post->title}}' >
        </div>
        <div class="form-group">
          <label >Description</label>
         <textarea  class="form-control" name="description" id="" cols="30" rows="5" >{{$post->description}}</textarea>
        </div>
        <div class="form-group">
            <label >Post Creator</label>
            <select name='user_id' class="form-control" >
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{$user->id == $post->user->id ? 'selected' : ''}}     >{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      @if ($errors->any())
         <div class="alert alert-danger mx-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
      @endif
</div>
@endsection