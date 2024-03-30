<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
    <style>
        body {
            margin-top: 50px;
            background-color: #f1f1f1;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #17A2B8;
        }

        .dropdown-menu {
            top: 60px;
            right: 0px;
            left: unset;
            width: 460px;
            box-shadow: 0px 5px 7px -1px #c1c1c1;
            padding-bottom: 0px;
            padding: 0px;
        }

        .dropdown-menu:before {
            content: "";
            position: absolute;
            top: -20px;
            right: 12px;
            border: 10px solid #343A40;
            border-color: transparent transparent #343A40 transparent;
        }

        .head {
            padding: 5px 15px;
            border-radius: 3px 3px 0px 0px;
        }

        .footer {
            padding: 5px 15px;
            border-radius: 0px 0px 3px 3px;
        }

        .notification-box {
            padding: 10px 0px;
        }

        .bg-gray {
            background-color: #eee;
        }

        @media (max-width: 640px) {
            .dropdown-menu {
                top: 50px;
                left: -16px;
                width: 290px;
            }

            .nav {
                display: block;
            }

            .nav .nav-item,
            .nav .nav-item a {
                padding-left: 0px;
            }

            .message {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-sm-10 col-12 offset-lg-1 offset-sm-1">
                <nav class="navbar navbar-expand-lg bg-info rounded">
                    <a class="navbar-brand text-light" href="#">{{auth()->user()->name}}</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"
                        style="display: unset !important;">
                        <ul class="nav nav-pills mr-auto justify-content-end">
                            <li class="nav-item active">

                            </li>
                          
                            <ul class="navbar-nav mr-auto">


                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                            </ul>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="head text-light bg-dark">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-12">
                                                <span>Notifications ({{Auth::user()->unreadNotifications()->count()}})</span>
                                                <a href="{{route('ReadNotification')}}" class="float-right text-light">Mark all as read</a>
                                            </div>
                                    </li>
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        
                                    
                                    <li class="notification-box">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-3 col-3 text-center">
                                                <img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8">
                                                <strong class="text-info">New Notification</strong>
                                               
                                                    
                                               
                                                <div>
                                                  <a href="{{route('notification',$notification->data['user_id'])}}">Admin {{$notification->data['status']}} {{$notification->data['name']}}</a>  
                                                </div>
                                                
                                                <small class="text-warning">{{$notification->created_at}}</small>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                   
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <table>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>address</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{$user->address}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>