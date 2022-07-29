@extends('layouts.frontlayout')
@section('content')
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid pe-lg-2 p-0">
                    <a class="navbar-brand fw-bold fs-3" href="/">Online Tutor Finder</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link pe-3 me-4 fw-bold"  href="/">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pe-3 me-4 fw-bold active" aria-current="page" href="/about">ABOUT US</a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link pe-3 me-4 fw-bold" href="/contact">CONTACT</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav icons ms-auto mb-2 mb-lg-0">
                             <a href="{{route('login')}}">
                            <li class=" nav-item"><span class="fw-bold ml-2">Login  </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            
        <table class="table">
            <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Name</th>
                <th scope="col">grade</th>
                <th scope="col">phone</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($teachers as $key=>$teacher)
            <tr>
             
                <th scope="row">{{$key+1}}</th>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->grade}}</td>
                <td>{{$teacher->phone}}</td>
                <td>
                    <form action="{{route('teacherprofile',$teacher->id)}}" method="POST">
                        @csrf
                    <button class="btn brn-info" type="submit">View Profile</button>
                </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection