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
                    <p class="card-text">{{$post->description}}</p>
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
                <h5 class="card-title">Name:- <span>{{$post->user->name}}</span></h5>
                <h5 class="card-title">Email:- <span>{{$post->user->email}}</span></h5>
                <h5 class="card-title">Created At:- <span>{{\Carbon\Carbon::instance($post->user->created_at)->format('l jS \\of F Y h:i:s A')}}</span></h5>
            </div>
        </div>
       </div>
   </div>
    </div>
    
@endsection