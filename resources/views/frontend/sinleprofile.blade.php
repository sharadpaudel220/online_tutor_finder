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
                            <a class="nav-link pe-3 me-4 fw-bold" href="/">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-3 me-4 fw-bold active" aria-current="page" href="/about">ABOUT US</a>
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
        <div class="col-sm-8 mt m-5" style="width: 800px;">

            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> --}}
            <hr>
            <br>
            <h3>{{ $info->name }}</h3> <br> <br>
            <span>Email: </span> <span>{{ $info->email }}</span> <br> <br>
            <span>Phone: </span> <span>{{ $info->phone }}</span> <br> <br>
            <span>Subject: </span> <span>{{ $info->subject }}</span><br> <br>
            <span>About : </span> <span>{{ $info->about }}</span> <br> <br>

        </div>
        @php
            // $hasRated = DB::select('select stars_rated from ratings where user_id='.$info->id. ' and rated_user_id='.Auth::user()->id)->first();
            $hasRated=App\Models\Rating::select('*')
                ->where('user_id', $info->id)
                ->where('rated_user_id', auth()->user()->id)
                ->first();
        // dd($hasRated);
        @endphp 
        @if (!$hasRated)
<form action="{{ route('admin.rateuser', $info->id) }}" method="post" >
@else
<form action="{{ route('admin.updaterating', $hasRated->id) }}" method="POST">
    @method('put')
    @endif 
            @csrf
            <div class="rating-css">
                <div class="star-icon">
                    @php
                        // $star=DB::select('select * from ratings where user_id='. $info->id. ' and rated_user_id =' . auth()->user()->id)->get();
            $star = App\Models\Rating::select('stars_rated')
                ->where('user_id', $info->id)
                ->where('rated_user_id', auth()->user()->id)
                ->first();
            // dd($star->stars_rated);
        @endphp


        <input type="radio" value="1" name="user_rating"
            @isset($star->stars_rated) @if ($star->stars_rated == 1)
                    checked
                    @endif @endisset
            id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="user_rating"
            @isset($star->stars_rated) @if ($star->stars_rated == 2)
                    checked @endif @endisset
            id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="user_rating"
            @isset($star->stars_rated) @if ($star->stars_rated == 3)
                    checked @endif @endisset
            id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="user_rating"
            @isset($star->stars_rated) @if ($star->stars_rated == 4)
                    checked @endif @endisset
            id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="user_rating"
            @isset($star->stars_rated) @if ($star->stars_rated == 5)
                    checked @endif @endisset
            id="rating5">
        <label for="rating5" class="fa fa-star"></label>
    </div>
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
    </form>



    </div>
@endsection
