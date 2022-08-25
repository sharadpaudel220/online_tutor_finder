@extends('layouts.admin')

@section('content')

 {{-- @section('content') --}}
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid pe-lg-2 p-0">
          
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
                
                </div>
            </div>
        </nav>
 
    

            {{-- Board --}}
            <div class=" d-lg-flex flex-lg-row d-flex flex-column-reverse bg-light mt-5">
                <img src="/backend/img/board.jpeg" alt="board" class="w-100 h-80" >
                
            </div>
            {{-- Board ends --}}
      
</div>

@endsection