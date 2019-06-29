<!doctype html>
<html lang="en">
<head>
    <title>Hello, world!</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <base href="http://{{$_SERVER['HTTP_HOST']}}">
     <title>{{ config('app.admin-name', 'Admin Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bsadmin.css') }}">
</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars"></i></a>

    <a class="navbar-brand" href="#"><i class="fa fa-code-branch"></i> Navbar</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <i class="fa fa-user"></i> Admin
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                        {{ csrf_field() }}
                        <a class="dropdown-item" href="javascript:void(0)" onclick="document.forms[0].submit()">Logout</a>
                    </form>
                    
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="d-flex">
    <nav class="sidebar bg-dark">
        <ul class="list-unstyled">
            <li><a href="#"><i class="fa fa-fw fa-link"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-fw fa-link"></i> Sidebar Link</a></li>
            <li>
                <a href="#submenu1" data-toggle="collapse"><i class="fa fa-fw fa-link"></i> Dropdown Link</a>
                <ul id="submenu1" class="list-unstyled collapse">
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                </ul>
            </li>
            <li>
                <a href="#submenu2" data-toggle="collapse"><i class="fa fa-fw fa-address-card"></i> Dropdown Link 2</a>
                <ul id="submenu2" class="list-unstyled collapse">
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                    <li><a href="#">Submenu Item</a></li>
                </ul>
            </li>
            
        </ul>
    </nav>

    <div class="content p-4">
         @yield('content')
    </div>
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bsadmin.js') }}"></script>

</body>
</html>