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

    .custom-element {
        position: relative;
        text-align: center;
        padding-bottom: 20px;
        /* Adjust as needed */
        margin-bottom: 20px;
        /* Space to account for the border */
    }

    .custom-element::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60%;
        height: 2px;
        background-color: #CB15AE;
        /* Adjust the color of the border */
    }

    /* VERTICAL LINE */
    .vertical-line {
        height: 50px;
        /* Adjust as needed */
        width: 2px;
        /* Adjust the thickness of the line */
        background-color: #CB15AE;
        /* Adjust the color of the line */
        margin: 0 20px;
        /* Adjust margin as needed */
        display: inline-block;
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

    /* media for circle */
    .circle {
         color: #CB15AE;  z-index: 1;  position: absolute; border: 3px solid #CB15AE; display: flex; justify-content: center; align-items: center;
    }
    @media (max-width: 479px) {
        /* Styles for extra small screens */
        .circle {
            /* Adjust position for extra small screens */
            top: 15%;
            left: 15%;
        }
    }

    @media (min-width: 350px) and (max-width: 380px) {
        /* Styles for small screens */
        .circle {
            /* Adjust position for small screens */
            border-radius: 50%;
            height: 13%; padding: 2%; width: 26%;
            top: 8%; left: 5%;
            
        }
    }
    @media (min-width: 380px) and (max-width: 440px) {
        /* Styles for small screens */
        .circle {
            /* Adjust position for small screens */
            border-radius: 50%;
            height: 14%; padding: 2%; width: 23%;
            top: 12%; left: 5%;
            
        }
    }
    @media (min-width: 440px) and (max-width: 500px) {
        /* Styles for small screens */
        .circle {
            /* Adjust position for small screens */
            border-radius: 50%;
            height: 15%; padding: 2%; width: 20%;
            top: 15%; left: 5%;
            
        }
    }
    @media (min-width:500px) and (max-width: 576px) {
        /* Styles for small screens */
        .circle {
            /* Adjust position for small screens */
            border-radius: 50%;
            height: 15%; padding: 2%; width: 19%;
            top: 17%; left: 5%;
            
        }
    }

    @media (min-width: 576px) and (max-width: 610px) {
        /* Styles for medium screens */
        .circle {
            /* Adjust position for medium screens */
            border-radius: 50%;
            height: 11%; padding: 2%; width: 38%;
            top: 3%; left: 6%;
            
        }
    }
    @media (min-width: 610px) and (max-width: 670px) {
        /* Styles for medium screens */
        .circle {
            /* Adjust position for medium screens */
            border-radius: 50%;
            height: 11%; padding: 2%; width: 37%;
            top: 4%; left: 6%;
            
        }
    }
    @media (min-width: 665px) and (max-width: 770px) {
        /* Styles for medium screens */
        .circle {
            /* Adjust position for medium screens */
            border-radius: 50%;
            height: 12%; padding: 2%; width: 32%;
            top: 5%; left: 6%;
            
        }
    }
    @media (min-width: 770px) and (max-width: 890px) {
        /* Styles for medium screens */
        .circle {
            /* Adjust position for medium screens */
            border-radius: 50%;
            height: 13%; padding: 2%; width: 28%;
            top: 8%; left: 6%;
            
        }
    }
    @media (min-width: 890px) and (max-width: 991px) {
        /* Styles for medium screens */
        .circle {
            /* Adjust position for medium screens */
            border-radius: 50%;
            height: 14%; padding: 2%; width: 24%;
            top: 10%; left: 6%;
            
        }
    }

    @media (min-width: 992px) and (max-width: 1060px) {
        /* Styles for large screens */
        .circle {
            /* Adjust position for large screens */
            border-radius: 50%;
            height: 15%; padding: 2%; width: 22%;
            top: 12.5%; left: 6%;
        }
    }
    @media (min-width: 1060px) and (max-width: 1199px) {
        /* Styles for large screens */
        .circle {
            /* Adjust position for large screens */
            border-radius: 50%;
            height: 15.5%; padding: 2%; width: 20.5%;
            top: 14%; left: 6%;
        }
    }

    @media (min-width: 1200px) and (max-width: 1390px) {
        /* Styles for extra large screens */
        .circle {
            /* Adjust position for extra large screens */
            border-radius: 50%;
            height: 14.5%; padding: 2%; width: 19.5%;
            top: 18%; left: 6%;
        }
    }

    @media (min-width: 1390px) {
        /* Styles for even larger screens */
        .circle {
            /* Adjust position for even larger screens */
            border-radius: 50%;
            height: 14.5%; padding: 2%; width: 16.5%;
            top: 22%; left: 6%;
        }
    }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark text-white" style="background-color: black;">
        <a class="navbar-brand" href="{{route('admin.home')}}">STUDENT</a>
        <!-- Custom Toggler Button -->
        <button class="navbar-toggler custom-toggler mx-3 my-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon "></span>
        </button>
        <!-- Navigation Links -->
        <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link text-light {{ request()->routeIs('student.home') ? 'active' : '' }}" href="{{route('student.home')}}">Home </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light {{ request()->routeIs('student.event') ? 'active' : '' }}" href="{{route('student.event')}}">Event</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light {{ request()->routeIs('student.certification') ? 'active' : '' }}" href="{{route('student.certification')}}">certification</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link text-light {{ request()->routeIs('student.attendence') ? 'active' : '' }}" href="{{route('student.attendence')}}">Attendence</a>
                </li>
            </ul>
            <!-- Login Button -->
           
                <a href="{{route('student.logout')}}"><button class="btn btn-light bg-white btn-sm my-2 mx-4 my-sm-0" type="submit">Log Out</button></a>
            
        </div>
    </nav>

    <script>
        document.querySelector('.custom-toggler').addEventListener('click', function () {
            document.querySelector('#navbarNav').classList.toggle('show');
        });
    </script>
</body>
</html>
