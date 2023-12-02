@extends('admin.layout.main')
@push('title')
    <title>society-list</title>
@section('main-section')
<div class="container my-2" >
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div
        class="row text-center d-flex justify-content-center align-item-center justify-content-evenly px-3  py-3 ">
        @foreach ($socities as $soc)
       
        <div class="card col-md-5 col-sm-5 m-3 p-0 borde text-white position-relative" style="background-color: black;"> 
            <img class="card-img-top borde" src="{{ asset('img.png') }}" alt="Card image cap">
            <div class="circle">
                <img src="{{ asset('img.png') }}" height="80px" width="80px" style="border-radius: 40px;">
            </div>
            <div class="card-header" style="border: none; display: flex; justify-content: flex-end;">
                <div class="border-btm mt-2" style="width: 70%; font-size: large;">
                    <h5><b>{{$soc->society_name}}</b></h5>
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid m-0 p-0 " style="display: flex; justify-content: space-evenly;">
                    <div class="head custom-element  p-0">
                        <h5 class="mb-0">Society Head</h5>
                        <p class="mb-2">- {{$soc->society_head}} -</p>
                    </div>
                    <div class="vertical-line"></div>
                    <div class="head custom-element p-0">
                        <h5 class="mb-0">Society Conviner</h5>
                        <p class="mb-2">- {{$soc->society_conviner}} -</p>
                    </div>
                </div>
                <div class="description">
                    <div class="dis mx-4  p-0" style="display: flex; justify-content: flex-start;">
                        <h5 class="m-0">Description</h5>
                    </div>
                    <hr class="mt-1 mx-4" style="width: 20%; color: #CB15AE ;opacity: 1; border-width: 2px;">
                    <div class="dis_content mx-4 " style="text-align: justify;">
                        <p>{{$soc->society_description}}</p>
                    </div>
                </div>
                <div class="contact bg-light text-dark mx-4 rounded  ">
                    <p style="height: 30px; display: flex; justify-content: center; align-items: center;">+91
                        {{$soc->society_contact}}</p>
                </div>
                <div class="email bg-light text-dark mx-4 rounded  ">
                    <p style="height: 30px; display: flex; justify-content: center; align-items: center;">
                        {{$soc->society_email}}</p>
                </div>
                <div class="bt my-4">
                    <a href="" class="btn btn-light mx-3 my-2 btn-w custom-btn">Block</a>
                    <a href="" class="btn btn-light mx-3 my-2 btn-w custom-btn">Edit</a>
                    <a href="{{route('admin.society.delete',['id'=>$soc->society_id])}}" class="btn btn-light mx-3 my-2 btn-w custom-btn">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
</div>
</div>

@endsection