<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('title')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Link to Source Sans Pro font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap">

    <!-- Link to Stalinist One font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap">
    

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }

        .navbar-brand {
            font-family: 'Stalinist One', cursive;
            margin-left: 1rem; /* Adjust the margin as needed */
        }
        .nav-link.active {
            /* width: 20%; */
      border-bottom: 2px solid #007bff; /* Set the color of the line below the active link */
    }
    .navbar-collapse.show .nav-link.active {
            width: 20%; /* Set the width when the toggler is open */
        }

    /* society card css */
    .borde {
        border: 3px solid #CB15AE;
    }

    .border-btm {
        border-bottom: 3px solid #CB15AE;
    }

    .btn-w {
        width: 80px;
    }

    
    .custom-btn {
        background-color: #fff;
        color: #000;
        border: 1px solid rgba(0, 224, 255, 0.8); /* Transparent border */
        border-radius: 3px;
        box-shadow: 4px 4px 4px rgba(0, 224, 255, 0.8); /* Shadow color #00E0FF */
    }

    .custom-btn:hover {
        background-color: #000;
        color: #fff;
        border-color: #00E0FF; /* Change border color on hover */
    }


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark text-white" style="background-color: black;">
        <a class="navbar-brand" href="{{route('admin.home')}}">LANDING PAGE</a>
        <!-- Custom Toggler Button -->        
    </nav>
    {{-- body --}}
<div class="container-fluid">
    <div class="row py-2">
        <div class="col-md-6 col-sm-12 ">
            <div class="container-fluid  text-white py-2 rounded-top"
        style="display: flex; justify-content: center; align-items: center;  background-color: black;">
        <h4 class="m-0 p-0">Announcement</h4>
    </div>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Society</th>
                        <th>Event</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">CSI</td>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                    </tr>
                    <tr>
                        <td scope="row">CSI</td>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                    </tr>
                    <tr>
                        <td scope="row">CSI</td>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                    </tr>
                    <tr>
                        <td scope="row">CSI</td>
                        <td>ayush singh</td>
                        <td>ayush singh</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-sm-12 ">
            <div class="container-fluid  text-white py-2 rounded-top"
        style="display: flex; justify-content: center; align-items: center;  background-color: black;">
        <h4 class="m-0 p-0">Login --> Go Ahead!</h4>
    </div>
            <div class="container-fluid">
                <form action="{{url('/')}}/admin/registration/add" method="post">
                    <!-- @csrf -->
                    <div class="row ">
                        <div class="col-12 col-sm-12 py-2">
                            <select class="form-select" name="role" form-select" aria-label=".form-select-lg example">
                                <option selected>Select your Role</option>
                                <option value="admin">Admin</option>
                                <option value="Society">Society</option>
                                <option value="user">User/Student</option>
                              </select>
                        </div>
                        <span class="text-danger">
                            @error('role')
                            {{$message}}
                            @enderror
                          </span> 
                    </div>
                    <div class="row ">
                        <div class="col-12 col-sm-12 py-2">
                            <input type="text" class="form-control" placeholder="Enter Email" name="email">
                             <span class="text-danger">
                                    @error('society_name')
                                    {{$message}}
                                    @enderror
                                  </span> 
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 col-sm-12 py-2">
                            <input type="password" class="form-control" placeholder="Enter password" name="pass">
                           <span class="text-danger">
                                    @error('urn')
                                    {{$message}}
                                    @enderror
                                  </span>
                        </div>
                    </div>
                    <div class="container text-center my-3 ">
                        <button type="submit" class="  custom-btn  mx-3 p-1 w-25">Login</button>
                        <button type="reset" class="  custom-btn mx-3 p-1 w-25">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid  " >
    <!-- certificatte verification -->
    <div class="container-fluid  text-white py-2 rounded-top"
        style="display: flex; justify-content: center; align-items: center;  background-color: black;">
        <h4 class="m-0 p-0">Certification Varification</h4>
    </div>
    <form action="" method="post">
        <!-- @csrf -->
        <div class="row ">
            <div class="col-md-4 py-2">
                <select class="form-select form-select" name="society" aria-label=".form-select-lg example">
                    <option selected>Select Society</option>
                    <option value="CSI">CSI</option>
                    <option value="ISTE">ISTE</option>
                    <option value="ITian club">ITian club</option>
                  </select>
                  <span class="text-danger">
                    @error('society')
                    {{$message}}
                    @enderror
                  </span> 
            </div>
            
            <div class="col-md-4 py-2">
                <input type="text" class="form-control" placeholder="Enter Urn" name="urn">
                <span class="text-danger">
                        @error('urn')
                        {{$message}}
                        @enderror
                      </span> 
            </div>


            <div class="col-md-4 py-2">
                <input type="text" class="form-control" placeholder="cert_number" name="Enter Certificate Number">
                <span class="text-danger">
                        @error('cert_number')
                        {{$message}}
                        @enderror
                      </span> 
            </div>
        </div>
        <div class="container text-center my-3 ">
            <button type="submit" class="  custom-btn  mx-3 p-1 w-25">Verify</button>
            <button type="reset" class="  custom-btn mx-3 p-1 w-25">Reset</button>
        </div>
    </form>
</div>
<div class="container-fluid d-flex justify-content-center align-items-center" style="background-color: black; height:8em;">
    <div class="footer text-center">
        <span class="line1 my-0 text-white">All Right Reserve &copy; copyright-2023</span><br/>
        <span class="line1 my-0 text-white">Developed and maintained by ACube</span>
    </div>
</div>
</body>
</html>
