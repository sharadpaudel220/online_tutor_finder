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
    {{-- <div class="row">

        
        <div class="col-lg-9">
            <div class="d-lg-flex">
                <div class="d-lg-flex align-items-center border mt-50">

                    
            </div>


        </div>
    </div> --}}
    <div class="col-sm-8 mt m-5" style="width: 800px;"> 

        <p>“Web Application for Finding Home Tutor Using Laravel” is a PHP based project that is designed to connect teachers and students that are looking for the private tutoring process. 

            This project acts as a bridge between students who are looking for a teacher to have private tuition & the teachers who are looking for student to teach private tuition. 
            </p>
        <hr>
        <br>
        <h3>What do we do?</h3>
        <ul>
            <li>Allow students to register</li>
            <li>Allow teachers to register</li>
            <li>Allow students to find teachers</li>
            <li>Negotiate the tuition fees</li>
        </ul>
      </div>

</div>
@endsection