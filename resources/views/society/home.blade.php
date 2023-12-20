@extends('society.layout.main')
@push('title')
    <title>society-pannel</title>
@section('main-section')
<div class="container-fluid m-0 p-0 " >
    <img class="card-img-top " src="{{ asset('img.png') }}" alt="Card image cap">

</div>
@php
$user=Session::get('user');

@endphp
    <div class="row px-3 py-2">
        <div class="col-md-4 col-sm-12 ">
            <div class="container-fluid  text-white py-2 rounded-top"
        style="display: flex; justify-content: center; align-items: center;  background-color: black;">
        <h4 class="m-0 p-0">Society Detail</h4>
    </div>
            <table class="table table-striped table-inverse table-responsive">
                <tbody>
                    <tr>
                        <td scope="row">Society Name</td>
                        <td>{{$user->society_name}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Society Head</td>
                        <td>{{$user->society_head}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Society Conviner</td>
                        <td>{{$user->society_conviner}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Contact</td>
                        <td>{{$user->society_contact}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Email</td>
                        <td>{{$user->society_email}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Discription</td>
                        <td>{{$user->society_description}}</td>
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
                        <td>Hacking</td>
                        <td>20/05/23</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>ITian club</td>
                        <td>05/03/23</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>Hacking</td>
                        <td>25/05/23</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>CSI</td>
                        <td>10/04/23</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection