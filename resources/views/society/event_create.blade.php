@extends('society.layout.main')
@push('title')
<title>create-event</title>
@section('main-section')
<div class="conatiner m-3 border rounded" >
    {{-- <div class="container bg-dark text-white"> --}}
        <h3 class="text-center h1 bg-dark text-white p-1 rounded-top">Create Event</h3>
    {{-- </div>     --}}
<form action=" " method="post" class="px-4 py-2">
    @csrf
    <div class="row ">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Event Name" name="event_name" value="{{old('event_name')}}">
          <span class="text-danger">
            @error('event_name')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
            {{-- <div class="col-12 col-sm-12 py-2"> --}}
                <select class="form-select" name="role" form-select aria-label=".form-select-lg example">
                    <option selected>Select Event Mode </option>
                    <option value="admin">Online</option>
                    <option value="Society">Offline</option>
                  </select>
            {{-- </div> --}}
          {{-- <span class="text-danger">
            @error('society_head')
            {{$message}}
            @enderror
          </span> --}}
        </div>
      </div>
    <div class="row">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Event Vanue" name="event_vanue" value="{{old('event_vanue')}}">
          <span class="text-danger">
            @error('event_vanue')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="WatsApp Link" name="watsapp_link" value="{{old('watsapp_link')}}">
          <span class="text-danger">
            @error('watsapp_link')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
    <div class="row">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Event Date & Time"  name="event_date" value="{{old('event_date')}}">
          <span class="text-danger">
            @error('event_date')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Event Duration" name="event_duration" value="{{old('event_duration')}}">
          <span class="text-danger">
            @error('event_duration')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
    <div class="row">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Registration Start Date & Time" name="reg_start_time" value="{{old('reg_start_time')}}">
          <span class="text-danger">
            @error('reg_start_time')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Registration End Date & Time" name="reg_start_time" value="{{old('reg_start_time')}}">
          <span class="text-danger">
            @error('reg_start_time')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
    <div class="row ">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Email" name="event_email" value="{{old('event_name')}}">
          <span class="text-danger">
            @error('event_email')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
            <input type="text" class="form-control" placeholder="Contact" name="event_contact" value="{{old('event_name')}}">
            <span class="text-danger">
              @error('event_contact')
              {{$message}}
              @enderror
            </span>
          </div>
      </div>
    <div class="row ">
        <div class="col-md-6 py-2">
          <input type="file" class="form-control" placeholder="Banner" name="event_banner" value="{{old('event_banner')}}">
          <span class="text-danger">
            @error('event_banner')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
      <div class="form-group py-2">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Event Discription" name="event_description" value="{{old('event_description')}}"></textarea>
        <span class="text-danger">
          @error('event_description')
          {{$message}}
          @enderror
        </span>
      </div>
      <div class="container text-center my-3 ">
<button type="submit" class="  custom-btn  mx-3 p-1 w-25">Submit</button>
<button type="reset" class="  custom-btn mx-3 p-1 w-25">Reset</button>
</div>
</form>
</div>

@endsection