@extends('society.layout.main')
@push('title')
@section('main-section')
{{-- <h1>student-event section is under maintainance</h1> --}}
{{-- {{print_r($data);}} --}}
@php
        // Retrieve the data from the session
        $data = session()->get('society_events');
    @endphp
@foreach($data as $d)
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
                            <h3 ><b>{{$d->event_name}}</b> </h3>
                    <hr style="border: 1px solid; color:#007bff">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12  text-center">Event Mode - {{$d->event_mode}}</div>
                <div class="col-md-6 col-sm-12  text-center">Event Vanue - {{$d->event_vanue}}</div>
                <div class="col-md-6 col-sm-12  text-center">Event Date & time - {{$d->event_datetime}}</div>
                <div class="col-md-6 col-sm-12  text-center">Event Duration - {{$d->event_duration}}</div>
                <div class="col-md-6 col-sm-12  text-center">Registration End Date : {{$d->event_reg_end_datetime}}</div>
                <div class="col-md-6 col-sm-12 p-1 text-center">WhatsApp link - <a href=""></a>{{$d->watsapp_link}}</div>
                {{-- <div class="col-md-4 col-sm-12 p-1 text-center"></div> --}}
            </div>
        </div>

        <div class="col-md-3 col-sm-12 d-flex flex-column justify-content-center align-items-center  text-center">
            <div class="btn btn-dark rounded custom-btn w-100 my-3 ">Edit</div> 
            <div class="btn btn-dark rounded custom-btn w-100">Delete</div>
        </div>   
 </div>
@endforeach
@endsection