@extends('layouts.admin')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="{{asset('uploads/profileimage/'.auth()->user()->image)}}" alt="profile picture">
              </a>
              {{-- dd(data); --}}
              <h1>{{auth()->user()->name}}</h1>
              <p>{{auth()->user()->email}}</p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <!-- <li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-warning pull-right r-activity">9</span></a></li> -->
              <li><a href="{{route('admin.userprofile.edit',auth()->user()->id)}}"> <i class="fa fa-edit"></i> Edit profile</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      
      <div class="panel">
          
          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>Full Name </span>:{{auth()->user()->name}}</p>
                  </div>

                  {{-- <div class="bio-row">
                      <p><span>Country </span>: {{auth()->user()->countries()}}</p>
                  </div> --}}
                  <div class="bio-row">
                      <p><span>phone</span>: {{auth()->user()->phone}}</p>
                  </div>
                  <!-- <div class="bio-row">
                      <p><span>Occupation </span>: UI Designer</p>
                  </div> -->
                  <div class="bio-row">
                      <p><span>subject </span>: {{auth()->user()->subject}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span> For Grade </span>: {{auth()->user()->grade}}</p>
                  </div>
                  <div class="bio-row">
                    <p><span> Email </span>: {{auth()->user()->email}}</p>
                </div>
                  
              </div>
          </div>
      </div>
  </div>
</div>
</div>


@endsection