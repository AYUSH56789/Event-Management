@extends('admin.layout.main')
@push('title')
    <title>admin-pannel</title>
    
@endpush
@section('main-section')
{{-- <h1 class="text-center">Home Page is under maintainance</h1> --}}
<div class="container my-2 bg-dark p-2 " style="height: 10%">
        <h1 class="text-white d-flex justify-content-center align-item-center">Total society count : {{$count}}</h1>
    </div>
    <div class="container px-0" ><table class="table table-striped table-inverse table-responsive">
        <h2 class="bg-secondary text-white d-flex justify-content-center align-item-center p-2 rounded-top">Society Event Status</h2>
        <thead class="thead-inverse">
            <tr>
                <th>Society Name</th>
                <th>Event Name</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">CSI</td>
                    <td>CRYPTOCURENCE AND WEB3</td>
                    <td>12/02/2023</td>
                </tr>
                <tr>
                    <td scope="row">CSI</td>
                    <td>CRYPTOCURENCE AND WEB3</td>
                    <td>12/02/2023</td>
                </tr>
            </tbody>
    </table> 
</div>
@endsection