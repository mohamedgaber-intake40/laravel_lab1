@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card mt-5" >
                    <div class="card-header">
                        <span>Post Info</span>
                    </div>
                    <div class="card-body">
                    <h5 class="card-title">Title:- <span>{{$post->title}}</span></h5>
                    <h5 class="card-title">Descritprion:-</h5>
                    <p class="card-text">{{$post->user_id}}</p>
                </div>
            </div>
           </div>
       </div>
       <div class="row justify-content-center">
        <div class="col-8 ">
            <div class="card mt-5" >
                <div class="card-header">
                    <span>Post Creator Info</span>
                </div>
                <div class="card-body">
                <h5 class="card-title">Name:- <span>{{$post->title}}</span></h5>
                <h5 class="card-title">Email:- <span>{{$post->title}}</span></h5>
                <h5 class="card-title">Created At:- <span>{{$post->title}}</span></h5>
                <h5 class="card-title">Descritprion:-</h5>
            </div>
        </div>
       </div>
   </div>
    </div>
    
@endsection