@extends('society.layout.main')
@push('title')
@section('main-section')
{{-- <h1>student-event section is under maintainance</h1> --}}
 <div class="row m-3 border  px-2 py-3  rounded">
        <div class="col-md-3 col-sm-12 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center p-2 ">
           {{-- <div class="container " > </div> --}}
           {{-- <img class="card-img-top borde" src="{{ asset('img.png') }}" alt="Card image cap"> --}}
           <div class="
           ">
            <img src="{{ asset('img.png') }}" height="150px" width="150px" style="border-radius: 80px;">
        </div>

        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="row">
                <div class="col  text-center">
                            <h3 ><b>Cyber Security And Ethical Hacking</b> </h3>
                    <hr style="border: 1px solid; color:#007bff">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12  text-center">Event Mode - Offline</div>
                <div class="col-md-6 col-sm-12  text-center">Event Vanue - Audotorium</div>
                <div class="col-md-6 col-sm-12  text-center">Event Date - 12/03/2023</div>
                <div class="col-md-6 col-sm-12  text-center">Event Duration - 2hrs</div>
                <div class="col-md-6 col-sm-12  text-center">Registration End Date : 15/05/2023</div>
                <div class="col-md-6 col-sm-12 p-1 text-center">WhatsApp link - <a href="">https://create.wa.link/</a></div>
                {{-- <div class="col-md-4 col-sm-12 p-1 text-center"></div> --}}
            </div>
        </div>

        <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center">
            <div class="btn btn-dark rounded custom-btn w-100 my-3 ">Edit</div> 
            <div class="btn btn-dark rounded custom-btn w-100">Delete</div>
        </div>
        
        
 </div>

@endsection