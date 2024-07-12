<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('fronted_assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('fronted_assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('fronted_assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{url('fronted_assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('fronted_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('fronted_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('fronted_assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('fronted_assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('fronted_assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('fronted_assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">  
  <link href="{{url('fronted_assets/css/style.css')}}" rel="stylesheet">
  @yield('custom-internal-css')
</head>

<body>
  <header id="header" class="fixed-top">
   
    <div class="container">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="/"> <img src="{{url('fronted_assets/img/slide/BR-logo1.png')}}"  class="d-inline-block align-top img-fluid" alt=""></a>
        <span class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> 
          <i class='bx bx-menu'></i>
          <i class='bx bx-x'></i>
        </span>
        <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNav">
            <ul class="navbar-nav mr-auto">     
              @php
                  $url = Route::current();
                  $curr_url = trim($url->uri);
              @endphp  
                <li><a class="nav-link {{($curr_url=='/') ? 'active' :''}}" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link {{($curr_url=='about-us') ? 'active' :''}}" href="{{url('about-us')}}">About Us</a></li>
                <li><a class="nav-link {{($curr_url=='our-work') ? 'active' :''}}" href="{{url('our-work')}}">Our Work</a></li>
                <li><a class="nav-link {{($curr_url=='our-members') ? 'active' :''}}" href="{{url('our-members')}}">Our Members</a></li>                
                @if (!session('email'))
                <li><a class="nav-link {{($curr_url=='joinus') ? 'active' :''}}" href="{{url('joinus')}}">Join Us</a></li>                    
                <li><a class="nav-link {{($curr_url=='signin') ? 'active' :''}}" href="{{url('signin')}}">Sign In</a></li>                              
                <li><a class="nav-link {{($curr_url=='contact-us') ? 'active' :''}}" href="{{url('contact-us')}}">Contact Us</a></li>
                @endif
                @if (session('email'))                                    
                <li class="nav-item dropdown other-device-user-icon">
                  <a class="nav-link dropdown-toggle align-items-center" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                    <span><img src="{{url('fronted_assets/img/profile/profile.jpg')}}" class="rounded-circle" height="36"alt="Portrait of a Woman"loading="lazy"/><span class="user-name">{{ucwords(session('fname'))}}</span> </span>
                    
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                      <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
                    </li>
                  </ul>
                </li>
                @endif                
            </ul>
        </div>
    </nav>
    </div>
  </header>