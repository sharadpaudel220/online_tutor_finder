@extends('layouts.frontlayout')
@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid pe-lg-2 p-0">
                <a class="navbar-brand fw-bold fs-3" href="/">Online Tutor Finder</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link pe-3 me-4 fw-bold active" aria-current="page" href="/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-3 me-4 fw-bold" href="/about">ABOUT US</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link pe-3 me-4 fw-bold" href="/contact">CONTACT</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav icons ms-auto mb-2 mb-lg-0">
                        <a href="{{ route('login') }}">
                            <li class=" nav-item"><span class="fw-bold ml-2">Login </span>
                        </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-lg-3 mb-lg-0 mb-2">
                <p>
                    <a class="btn btn-primary w-100 d-flex align-items-center justify-content-between"
                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                        aria-controls="collapseExample">
                        <span class="fas fa-bars"><span class="ps-3">All Categories</span></span>

                        <span class="fas fa-chevron-down"></span>
                    </a>
                </p>
                @php
                    $subjects = DB::select('select subject from users');
                    // dd($subjects);
                    $teachers = DB::select('select distinct subject from users');
                @endphp
                @foreach ($teachers as $teacher)
                {{ Form::open(['url' => route('searchbycategory'), 'method' => 'post']) }}
                <div class="collapse show border" id="collapseExample">
                    <ul class="list-unstyled">
                        
                            <li>
                                @auth
                                    {{-- <a href="{{route('searchbycategory',$teacher->subject)}}">{{$teacher->subject}}</a> --}}

                                    {{-- <input type="hidden" name="cquery" value="{{ $teacher->subject }}"> --}}
                                    {{Form::hidden('subject', $teacher->subject)}}

                                    <button class="btn btn-lite" type="submit">{{ $teacher->subject }}</button>
                                    @else
                                    <a href="{{ route('login') }}" class="btn btn-light">{{ $teacher->subject }}</a>
                               @endauth
                            </li>
                        
                    </ul>

                </div>
                {{ Form::close() }}
                @endforeach

            </div>
            <div class="col-lg-9">
                <div class="d-lg-flex">
                    <div class="d-lg-flex align-items-center border">
                        <div class="dropdown w-100 my-lg-0 my-2">
                            <button class="btn btn-secondary d-flex justify-content-between align-items-center"
                                type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="true">
                                {{-- <span class=" w-100 d-flex align-items-center">
                                <span class=" fw-lighter pe-2">ALL</span><span class="fw-lighter pe-3">
                                    Categories</span>
                                <span class="fas fa-chevron-down ms-auto"></span>
                            </span> --}}
                            </button>
                            {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <li><a class="dropdown-item" href="#">Science</a></li>
                            <li><a class="dropdown-item" href="#">Math</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Laravel</a></li>
                        </ul> --}}
                        </div>
                        <form action="{{ route('search') }}" type='GET'>
                            @csrf
                            <div class="d-flex align-items-center w-100 h-100 ps-lg-0 ps-sm-3">
                                <input class=" ps-md-0 ps-3" type="text" placeholder="Enter a subject..." name="query">
                                <div>
                                    <button class="btn btn-lite" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center ms-lg-auto mt-lg-0 mt-3 pe-2">


                    </div>
                </div>


                {{-- Board --}}
                <div class=" d-lg-flex flex-lg-row d-flex flex-column-reverse bg-light mt-5">
                    <img src="/backend/img/board.jpeg" alt="board" class="w-100 h-100">

                </div>
                {{-- Board ends --}}
            </div>
        </div>
    </div>
@endsection
