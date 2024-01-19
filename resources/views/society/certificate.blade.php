@extends('society.layout.main')
@push('title')
<title>society-title</title>
@section('main-section')
<!-- resources/views/certificate/form.blade.php -->
@if(session('success'))
<div class="alert alert-success  m-2 z-index-2">
    {{ session('success') }}
</div>
@endif

@if(session('info'))
<div class="alert alert-info  m-2 z-index-2">
    {{ session('info') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger  m-2 z-index-2">
    {{ session('error') }}
</div>
@endif

@if(session('warning'))
<div class="alert alert-danger  m-2 z-index-2">
    {{ session('warning') }}
</div>
@endif

{{-- <div class="conatiner m-3 border rounded"> --}}
    <div class="conatiner m-3 p-3 border rounded">
        
        <form class="p-0 m-0" action="{{ route('society.certificate') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row text-center ">
                <div class="col-md-7 px-4 py-2">
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
                <div class="col-md-5 px-1 py-2">
                    <button type="submit" class="  custom-btn  mx-3 p-1 w-50">Check Certificate</button>
                </div>
            </div>
        </form>
    </div>
    {{--
    <hr> --}}
    {{--
</div> --}}
{{-- </div> --}}
@if($form)
<div class="conatiner m-3  border rounded">
    <h3 class="text-center h1 bg-dark text-white p-1 rounded-top">Certificate Generation Form</h3>
    <form class="px-4 py-2" action="{{ route('generateCertificate') }}" method="post" enctype="multipart/form-data">
        @csrf
        <p ><span class="text-danger">Note:</span> <a href="">Click Here </a> to know the instructions for certificate generation. </p>
        <div class="row ">
            <div class="col p-0 py-2">
                <input type="file" class="form-control" name="certificate_image" accept="image/*" >
                <span class="text-danger"> Upload certificate templates (file must be in .jpg format and less than 5 mb )</span>
                <span style="color: red">
                    @error('certificate_image')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
        
       
        
        <div class="row border p-2 my-2 ">
            <div class="col-2 py-2">
                Name Field :
            </div>
            
            <div class="col-4 py-2">
                
                <div class="row border ">
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="X1" name="name_x1" id="name">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="Y1" name="name_y1" id="name">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="X2" name="name_x2" id="name">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="Y2" name="name_y2" id="name">
                    </div>
                </div><span class="text-danger">Fill Coordinates <a href="https://imagemap.org/"> click here</a> </span>
                <span style="color: red">
                    @error('name_x1')
                        {{ $message }}
                    @enderror
                    @error('name_y1')
                        {{ $message }}
                    @enderror
                    @error('name_x2')
                        {{ $message }}
                    @enderror
                    @error('name_y2')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-3 py-2">
                <div class="row border ">
                    <div class="col-6 py-2">
                        <select class="form-select" name="name_font" form-select aria-label=".form-select example">
                            <option selected>Select Font </option>
                            <option value="Arial.ttf">Arial</option>
                            {{-- <option value="offline"></option> --}}
                        </select>
                    </div>
                    <div class="col-6 py-2">
                        <select class="form-select" name="name_font_size" form-select aria-label=".form-select example">
                            
                            <option selected class="border">Select Font Size </option>
                            {{-- <hr > --}}
                            @for($i = 2; $i <+ 80; $i=$i+2)    
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            {{-- <option value="offline"></option> --}}
                        </select>
                    </div>
                </div>
                <span class="text-danger"> Select Font and Size</span>
                <span style="color: red">
                    @error('name_font')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-3 py-2">
                <div class="row border">
                    <div class="col-4 py-2">
                        <input type="number" class="form-control" placeholder="R" name="name_red" >
                    </div>
                    <div class="col-4 py-2">
                        <input type="number" class="form-control" placeholder="G" name="name_green" id="name">
                    </div>
                    <div class="col-4 py-2">
                        <input type="number" class="form-control" placeholder="B" name="name_blue" >
                    </div>
                </div><span class="text-danger">Fill RGB value for Font <a href="https://www.rapidtables.com/web/color/RGB_Color.html"> click here</a> </span>
                <span style="color: red">
                    @error('name_red')
                        {{ $message }}
                    @enderror
                    @error('name_green')
                        {{ $message }}
                    @enderror
                    @error('name_blue')
                        {{ $message }}
                    @enderror
                </span>
        </div>
    </div>
        <div class="row border p-2 my-2 ">
            <div class="col-2 py-3">
                urn Field :
            </div>
            
            <div class="col-4 py-2">
                
                <div class="row border ">
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="X1" name="urn_x1">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="Y1" name="urn_y1">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="X2" name="urn_x2">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="Y2" name="urn_y2">
                    </div>
                </div><span class="text-danger">Fill Coordinates <a href="https://imagemap.org/"> click here</a> </span>
                <span style="color: red">
                    @error('urn_x1')
                        {{ $message }}
                    @enderror
                    @error('urn_y1')
                        {{ $message }}
                    @enderror
                    @error('urn_x2')
                        {{ $message }}
                    @enderror
                    @error('urn_y2')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-3 py-2">
                <div class="row border ">
                    <div class="col py-2">
                        <select class="form-select" name="urn_font" form-select aria-label=".form-select example">
                            <option selected>Select Font </option>
                            <option value="Arial.ttf">Arial</option>
                            {{-- <option value="offline"></option> --}}
                        </select>
                    </div>
                        <div class="col py-2">
                        <select class="form-select" name="urn_font_size" form-select aria-label=".form-select example">
                            <option selected class="border">Select Font Size </option>
                            {{-- <hr > --}}
                            @for($i = 2; $i <+ 80; $i=$i+2)    
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            {{-- <option value="offline"></option> --}}
                        </select>
                    </div> 
                </div>
                <span class="text-danger"> Select Font and Size</span>
                <span style="color: red">
                    @error('urn_font')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-3 py-2">
                <div class="row border">
                    <div class="col-4 py-2">
                        <input type="number" class="form-control" placeholder="R" name="urn_red" >
                    </div>
                    <div class="col-4 py-2">
                        <input type="number" class="form-control" placeholder="G" name="urn_green">
                    </div>
                    <div class="col-4 py-2">
                        <input type="number" class="form-control" placeholder="B" name="urn_blue">
                    </div>
                </div><span class="text-danger">Fill RGB value for Font <a href="https://www.rapidtables.com/web/color/RGB_Color.html"> click here</a> </span>
                <span style="color: red">
                    @error('urn_red')
                        {{ $message }}
                    @enderror
                    @error('urn_green')
                        {{ $message }}
                    @enderror
                    @error('urn_blue')
                        {{ $message }}
                    @enderror
                </span>
        </div>
    </div>
        <div class="row border p-2 my-2">
            <div class="col-2 py-3">
                Bar Code Field :
            </div>
            
            <div class="col-4 py-2">
                
                <div class="row border ">
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="X1" name="barcode_x1">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="Y1" name="barcode_y1">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="X2" name="barcode_x2">
                    </div>
                    <div class="col-3 py-2">
                        <input type="number" class="form-control" placeholder="Y2" name="barcode_y2">
                    </div>
                </div><span class="text-danger">Fill Coordinates <a href="https://imagemap.org/"> click here</a> </span>
                <span style="color: red">
                    @error('barcode_x1')
                        {{ $message }}
                    @enderror
                    @error('barcode_y1')
                        {{ $message }}
                    @enderror
                    @error('barcode_x2')
                        {{ $message }}
                    @enderror
                    @error('barcode_y2')
                        {{ $message }}
                    @enderror
                </span>
            </div>            
            <div class="col-4 py-2">
                
                <div class="row border mx-1 ">
                    <div class="col  py-2 ">
                        <input type="number" class="form-control" placeholder="Barcode Size" name="barcode_size">
                    </div>
                </div><span class="text-danger">Fill Barcode size (in px.) </span>
                <span style="color: red">
                    @error('barcode_size')
                        {{ $message }}
                    @enderror
                   
            </div>            
    </div>
    <div class="container text-center my-3 ">
        <button type="submit" class="  custom-btn  mx-3 p-1 w-25">Generate Certificates</button>
        <button type="reset" class="  custom-btn mx-3 p-1 w-25">Reset</button>
        </div>
    </form>
</div>
@endif
{{-- <form action="{{ route('generateCertificate') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="certificate_image">Upload Certificate Image:</label>
        <input type="file" name="certificate_image" accept="image/*" required>
        <span style="color: red">
            @error('certificate_image')
            {{ $message }}
            @enderror
        </span>
    </div>
    <div>
        <button type="submit">Generate Certificate</button>
    </div>
</form> --}}

{{-- THIS PRINT TABLE FOR GENERATED CERTIFICATES --}}
{{-- @if($certificates->count() > 0) --}}
@if(isset($certificates) )
<div class="container">
    <h2>Generated Certificates</h2>
    <table class="table">
        <thead>
            <tr>
                <th>S No.</th>
                <th>Name</th>
                <th>Download Certificate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($certificates as $key => $studentCertificate)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $studentCertificate->user_name }}</td>
                <td>
                    <a href="{{ route('certificate.download', ['id' => $studentCertificate->certificate_id]) }}"
                        class="btn btn-primary">
                        Download
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection