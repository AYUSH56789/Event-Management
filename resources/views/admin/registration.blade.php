@extends('admin.layout.main')
@push('title')
    <title>society-registration</title>
@section('main-section')
<div class="conatiner p-4 " >
    {{-- <div class="container bg-dark text-white"> --}}
        <h2 class="text-center h1 bg-dark text-white p-2 rounded-top">Society Registration Page</h2>
    {{-- </div>     --}}
<form action="{{url('/')}}/admin/registration/add" method="post">
    @csrf
    <div class="row ">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Society Name" name="society_name" value="{{old('society_name')}}">
          <span class="text-danger">
            @error('society_name')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Society Head" name="society_head" value="{{old('society_head')}}">
          <span class="text-danger">
            @error('society_head')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
    <div class="row">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Society Conviner" name="society_conviner" value="{{old('society_conviner')}}">
          <span class="text-danger">
            @error('society_conviner')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Contact" name="society_contact" value="{{old('society_name')}}">
          <span class="text-danger">
            @error('society_contact')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
    <div class="row ">
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Email" name="society_email" value="{{old('society_name')}}">
          <span class="text-danger">
            @error('society_email')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
          <input type="text" class="form-control" placeholder="Set Password" name="society_pass" value="{{old('society_pass')}}">
          <span class="text-danger">
            @error('society_pass')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
    <div class="row ">
        <div class="col-md-6 py-2">
          <input type="file" class="form-control" placeholder="Banner" name="society_banner" value="{{old('society_banner')}}">
          <span class="text-danger">
            @error('Banner')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="col-md-6 py-2">
          <input type="file" class="form-control" placeholder="logo" name="society_logo" value="{{old('society_logo')}}">
          <span class="text-danger">
            @error('logo')
            {{$message}}
            @enderror
          </span>
        </div>
      </div>
      <div class="form-group py-2">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Discription" name="society_description" value="{{old('society_description')}}"></textarea>
        <span class="text-danger">
          @error('society_description')
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