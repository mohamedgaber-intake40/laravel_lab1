@extends('layouts.app')
@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="card mt-5" >
                    <div class="card-header bg-dark text-white">
                        <span>Post Info</span>
                    </div>
                    <div class="card-body">
                    <h5 class="card-title"><b class="text-info">Title:-</b> <span>{{$post->title}}</span></h5>
                    <h5 class="card-title"><b class="text-info">Descritprion:-</b></h5>
                    <p class="card-text">{{$post->description}}</p>
                </div>
            </div>
           </div>
       </div>
       <div class="row justify-content-center">
        <div class="col-8 ">
            <div class="card mt-5" >
                <div class="card-header  bg-dark text-white">
                    <span>Post Creator Info</span>
                </div>
                <div class="card-body">
                <h5 class="card-title "><b class="text-info">Name:- </b><span>{{$post->user->name}}</span></h5>
                <h5 class="card-title"><b class="text-info">Email:- </b><span>{{$post->user->email}}</span></h5>
                <h5 class="card-title"><b class="text-info">Created At:-</b> <span>{{\Carbon\Carbon::instance($post->user->created_at)->format('l jS \\of F Y h:i:s A')}}</span></h5>
            </div>
        </div>
       </div>
   </div>
    </div>
    
@endsection