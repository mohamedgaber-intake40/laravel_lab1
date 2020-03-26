@extends('layouts.app')
@section('content')
<div class="container">
    <form class="m-5" method="POST" action='{{ route('posts.store') }}'>
        @csrf
        <div class="form-group">
          <label >Title</label>
          <input type="text" name='title' class="form-control"  >
        </div>
        <div class="form-group">
          <label >Description</label>
         <textarea  class="form-control" name="description" id="" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label >Post Creator</label>
            <select name='user_id' class="form-control" >
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection