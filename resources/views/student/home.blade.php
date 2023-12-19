@extends('student.layout.main')
@push('title')
<title>student</title>
@section('main-section')
@php
$student=Session::get('student');
@endphp
<div class="row px-3 py-2">
        <div class="col-md-4 col-sm-12 ">
            <div class="container-fluid  text-white py-2 rounded-top"
        style="display: flex; justify-content: center; align-items: center;  background-color: black;">
        <h4 class="m-0 p-0">Student Detail</h4>
    </div>
            <table class="table table-striped table-inverse table-responsive">
                <tbody>
                    <tr>
                        <td scope="row">Name</td>
                        <td>{{$student[0]['user_name']}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Branch</td>
                        <td>{{$student[0]['user_branch']}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Year</td>
                        <td>{{$student[0]['user_year']}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Urn</td>
                        <td>{{$student[0]['user_urn']}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Crn</td>
                        <td>{{$student[0]['user_crn']}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Contact</td>
                        <td>{{$student[0]['user_contact']}}</td>
                    </tr>
                    <tr>
                        <td scope="row">Email</td>
                        <td>{{$student[0]['user_emailc']}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8 col-sm-12 ">
            <div class="container-fluid  text-white py-2 rounded-top"
            style="display: flex; justify-content: center; align-items: center;  background-color: black;">
            <h4 class="m-0 p-0">Registered Event</h4>
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
                        <td>10/05/23</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>web3</td>
                        <td>02/05/23</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                    <tr>
                        <td>Hacking</td>
                        <td>20/05/23</td>
                        <td class="d-flex align-item-center justify-content-center"><button type="reset" class="btn w-80  custom-btn py-0 ">Know More</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
@endsection