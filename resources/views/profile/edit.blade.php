@extends('layouts.admin')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets bootdey">
        <form method="POST" action="{{ route('admin.userprofile.update', $user->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">

                <div class="profile-nav col-md-3">

                    <div class="panel">
                        {{-- form for image --}}

                        <div class="user-heading round ">

                            <img src="{{asset('uploads/profileimage/'.auth()->user()->image)}}" alt="" class="h-50 w-50"> 
                            <input  id="imageName" type="file" name="image">

                            <h1>{{ auth()->user()->name }}</h1>
                            <p>{{ auth()->user()->email }}</p>
                        </div>


                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="{{ route('admin.userprofile.index', auth()->user()->id) }}"> <i
                                        class="fa fa-user"></i> Profile</a></li>
                            <!-- <li><a href="#"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-warning pull-right r-activity">9</span></a></li> -->
                            <li><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="profile-info col-md-9">

                    <div class="panel">

                        <div class="panel-body bio-graph-info">
                            <h1>Bio Graph</h1>


                            <div class="row">
                                <div class="bio-row">
                                    <p><span>Full Name </span></p>
                                    <input class="form-group" name='name' type="text", value="{{ $user->name }}">
                                </div>

                                {{-- <div class="bio-row">
                      <p><span>Country </span>: <p>
                      <input class="form-group" name='country' type="text", value="{{$user->country}}">

                  </div> --}}
                                <div class="bio-row">
                                    <p><span>Phone</span>: </p>
                                    <input class="form-group" name='phone' type="text", value="{{ $user->phone }}">

                                </div>
                                <div class="bio-row">
                                    <p><span>subject </span>: </p>
                                    <input class="form-group" name='subject' type="text", value="{{ $user->subject }}">

                                </div>
                                <div class="bio-row">
                                    <p><span>Email </span></p>
                                    <input class="form-group" name='email' type="text", value="{{ $user->email }}"
                                        value="old(email)">

                                </div>
                                <div class="bio-row">
                                    <p><span>For grade </span>: </p>
                                    <input class="form-group" name='grade' type="text", value="{{ $user->grade }}">

                                </div>
                                <button class="btn btn-primary" type="submit">update</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
@endsection
