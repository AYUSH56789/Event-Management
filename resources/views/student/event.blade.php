@extends('student.layout.main')
@push('title')
<title>student-event</title>
@section('main-section')
{{-- <h1>student-event section is under maintainance</h1> --}}
 <div class="row m-3 border  px-2 py-3  rounded">
        <div class="col-md-3 col-sm-12 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center ">
           {{-- <div class="container " > </div> --}}
           {{-- <img class="card-img-top borde" src="{{ asset('img.png') }}" alt="Card image cap"> --}}
           <div class="
           ">
            <img src="{{ asset('img.png') }}" height="80px" width="80px" style="border-radius: 40px;">
        </div>

        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="row">
                <div class="col  text-center">
                            <h3 > <b>Cyber Security And Ethical Hacking</b> </h3>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 p-1 text-center">Mode - Online</div>
                <div class="col-md-6 col-sm-12 p-1 text-center">Date - 12/03/2023</div>
                <div class="col-md-6 col-sm-12 p-1 text-center">Duration - 2hrs</div>
                <div class="col-md-6 col-sm-12 p-1 text-center">Registration End Date : 15/05/2023</div>
                <div class="col-md-6 col-sm-12 p-1 text-center"></div>
                <div class="col-md-6 col-sm-12 p-1 text-center"></div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center">
            <div class="btn btn-dark rounded custom-btn w-100 mb-2 ">Know More</div> 
            <div class="btn btn-dark rounded custom-btn w-100">Register</div>
        </div>
        
        
 </div>

@endsection