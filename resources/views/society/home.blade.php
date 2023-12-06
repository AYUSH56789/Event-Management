@extends('society.layout.main')
@push('title')
    <title>society-pannel</title>
@section('main-section')
<div class="container-fluid m-0 p-0 " >
    <img class="card-img-top " src="{{ asset('img.png') }}" alt="Card image cap">

</div>
<div class="container-fluid">
    <div class="row py-2">
        <div class="col-md-4 col-sm-12 ">
            <div class="container-fluid  text-white py-2 rounded-top"
        style="display: flex; justify-content: center; align-items: center;  background-color: black;">
        <h4 class="m-0 p-0">Society Detail</h4>
    </div>
            <table class="table table-striped table-inverse table-responsive">
                <tbody>
                    <tr>
                        <td scope="row">Society Name</td>
                        <td>computer science of india</td>
                    </tr>
                    <tr>
                        <td scope="row">Society Head</td>
                        <td>ayush singh</td>
                    </tr>
                    <tr>
                        <td scope="row">Society Conviner</td>
                        <td>ayush singh</td>
                    </tr>
                    <tr>
                        <td scope="row">Contact</td>
                        <td>977994578</td>
                    </tr>
                    <tr>
                        <td scope="row">Email</td>
                        <td>ayushsingh123@gmail.com</td>
                    </tr>
                    <tr>
                        <td scope="row">Discription</td>
                        <td>Lorem  consectetur, adlpa corrupti ucusantium, possimus iste placeat, asps ab, eos cum natus. Minus suscipit v</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8 col-sm-12 ">
            <div class="container-fluid  text-white py-2 rounded-top"
            style="display: flex; justify-content: center; align-items: center;  background-color: black;">
            <h4 class="m-0 p-0">Upcoming Event Status</h4>
        </div>
            <table class="table  table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection