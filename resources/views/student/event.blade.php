@extends('student.layout.main')
@push('title')
<title>student-event</title>
@section('main-section')
{{-- <h1>student-event section is under maintainance</h1> --}}
<!-- Display success message -->
@if(session('msg'))
    <div class="alert alert-success m-2 z-index-2">
        {{ session('msg') }}
    </div>
@endif

<!-- Display error message -->
@if(session('error'))
    <div class="alert alert-warning m-2 z-index-2">
        {{ session('error') }}
    </div>
@endif

@foreach ($event as $ev)
 <div class="row m-3 border  px-2 py-3  rounded">
        <div class="col-md-3 col-sm-12 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center p-2">
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
                            <h3 > <b>{{$ev->event_name}}</b> </h3>
                            <hr style="border: 1px solid; color:#007bff">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 text-center">Mode - {{$ev->event_mode}}</div>
                <div class="col-md-6 col-sm-12 text-center">Date - {{$ev->event_datetime}}</div>
                <div class="col-md-6 col-sm-12 text-center">Duration - {{$ev->event_duration}}</div>
                <div class="col-md-6 col-sm-12 text-center">Registration End Date : {{$ev->event_reg_end_datetime}}</div>
                <div class="col-md-6 col-sm-12 text-center">Contact : {{$ev->event_contact}}</div>
                <div class="col-md-6 col-sm-12 text-center">Email : {{$ev->event_email}}</div>
                {{-- <div class="col-md-6 col-sm-12 p-1 text-center"></div> --}}
                {{-- <div class="col-md-6 col-sm-12 p-1 text-center"></div> --}}
            </div>
        </div>
        <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center">
            <div class="btn btn-dark rounded custom-btn w-100 my-3 ">Know More</div> 
            <a href="{{ route('student.event_reg', ['event_id' => $ev->event_id]) }}" class="btn btn-dark rounded custom-btn w-100">Register</a>

        </div> 
 </div>
@endforeach
@endsection