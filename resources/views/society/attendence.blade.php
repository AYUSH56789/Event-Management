@extends('society.layout.main')
@push('title')
<title>society-attendance</title>
@endpush
@section('main-section')
@php
// Retrieve the data from the session
$data = session()->get('society_id');
@endphp
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
<div class="conatiner m-3 p-3 border rounded">

    <form class="p-0 m-0" action="{{ route('society.generate-qrcode') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row text-center ">
            <div class="col px-4 py-2">
                <select class="form-select" name="event_id" aria-label=".form-select-lg example">
                    <option value="">Select Event</option>
                    @foreach($data as $s_name)
                    <option value="{{ $s_name['event_id']}}">
                        {{ $s_name['event_name'] }}
                    </option>
                    @endforeach
                </select>
                <span class="text-danger">
                    @error('society')
                    {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="row text-center ">
            <div class="col px-1 py-2">
                <button type="submit" class="  custom-btn  mx-3 p-1 w-50">Activate Attendence</button>
            </div>
        </div>
</div>
</form>
</div>
{{-- <h1>Generated QR Code</h1> --}}
@isset($content)
{{-- <div class="container m-3 p-3 text-center border rounded"> --}}
    
    <div class="conatiner m-4 py-3 border rounded">

        <form class="p-0 m-0" action="{{ route('society.deactivate-qrcode') }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row text-center ">
                <div class="col  ">

                    <img class="" src="data:image/png;base64,{{ base64_encode($content) }}" alt="QR Code">
                </div>
            </div>
            <input type="hidden" name="event_id" value="{{ $eventId }}">
            <div class="row text-center ">
                <div class="col px-1 py-2">
                    <button type="submit" class="  custom-btn  mx-3 p-1 w-50">Deactivate Attendence</button>
                </div>
            </div>
    </div>
    </form>
</div>
@endisset
@endsection