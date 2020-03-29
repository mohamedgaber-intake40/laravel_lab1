@extends('layouts.app')

@section('content')
<div class="container">
  <a class="btn btn-info my-5 btn-lg" href='{{route('posts.create')}}'>Create</a>
  {{-- <a class="btn btn-info my-5 btn-lg" href='{{route('posts.create')}}'>show Google Data</a> --}}
  {{-- <a class="btn btn-info my-5 btn-lg" href='{{route('posts.create')}}'>show Github Data</a> --}}

    <table class="table">
        <thead class=" thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">slug</th>
            <th scope="col">Posted by</th>
            <th scope="col">Created At</th>
            <th scope="col" colspan="3" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="table-striped">
          @if (count($posts)>0)
          @foreach ($posts as $post)
          
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title}}</td>
                <td>{{ $post->slug}}</td>
                <td>{{ $post->user->name}}</td>
                <td>{{\Carbon\Carbon::instance($post->created_at)->format('Y-m-d')}}</td>
                <td><a href="{{route('posts.show',['post'=>$post->id])}}" class="btn btn-dark">View</a></td>
                <td><a href="{{route('posts.edit',['post'=>$post->id])}}"class="btn btn-info">Edit</a></td>
                <td><button type="button" class="btn btn-danger deleteBtn"  data-toggle="modal" data-target="#deleteModal" data-id="{{$post->id}}">Delete</td>

            </tr>      
          @endforeach        
         
        </tbody>
      </table>



    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title text-white" id="deleteModalLabel">Confirmation</h5>
            <button type="button text-white" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="text-white">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            are you sure you want to delete ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form method ="post" action="{{route('posts.destroy',['post'=> $post->id])}}">
              @csrf
              @method('delete')
              <input type="hidden" value="" id="hiddenInput" name="post_id">
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @else
    <td colspan="6" class="text-center text-danger" >no posts to show</td>
@endif 
</div>
@endsection
