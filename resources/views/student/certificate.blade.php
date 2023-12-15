@extends('student.layout.main')
@push('title')
<title>student-certificate</title>
@section('main-section')
{{-- <h1>student-certificate section is under maintainance</h1> --}}
<form action="" method="post">
    <!-- @csrf -->
    <div class="row px-4">
        <div class="col  py-2 pt-3">
            <select class="form-select form-select" name="society" aria-label=".form-select-lg example">
                <option selected>Select Event</option>
                <option value="CSI">Hacking</option>
                <option value="ISTE">Cryptocruncy</option>
                <option value="ITian club">AI/ML</option>
              </select>
              <span class="text-danger">
                @error('society')
                {{$message}}
                @enderror
              </span> 
        </div>
    </div>
    <div class="row">
      <div class="container text-center my-2 ">
        <button type="submit" class="btn custom-btn  mx-3 w-50">Get Certificate</button>
        {{-- <button type="reset" class="  custom-btn mx-3 p-1 w-25">Reset</button> --}}
    </div>
    </div>
    </form>
@endsection