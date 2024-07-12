<!DOCTYPE html>
<html lang="hi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('backend_assets/assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('backend_assets/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('backend_assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('backend_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('backend_assets/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('backend_assets/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{url('backend_assets/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{url('backend_assets/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('backend_assets/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('backend_assets/assets/css/style.css')}}" rel="stylesheet">

  @yield('custom-internal-css')
  <style>
    #shadow-host-companion{
      display: none !important;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{url('backend_assets/assets/img/logo.png')}}" alt="">
        <!-- <span class="d-none d-lg-block">BR Islamic Admin</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

       

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{url('backend_assets/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ucwords(session('fname'))}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ucwords(session('fname') . " ".session('lname'))}}</h6>
              <span>@php
                  if(session()->has('role1') && session()->has('role2')){
                    echo ucwords(session('role1')." & ".session('role2'));
                  }else{
                    echo ucwords(session('role1'));
                  }
              @endphp</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li> --}}
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('/logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      

      <li class="nav-item">
        <a class="nav-link " href="{{url('member/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class='bx bxs-user-account'></i><span>My Profile</span>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('member/my-payment-details')}}">
              <i class='bx bx-rupee' ></i><span>My Payment Details</span>
            </a>
          </li>
          <li>
            <a href="{{url('member/pay-for-welfare')}}">
              <i class='bx bx-rupee' ></i><span>Pay For Welfare</span>
            </a>
          </li>
          <li>
            <a href="{{url('member/upload-screenshot')}}">
              <i class='bx bx-screenshot'></i><span>Upload Screenshot</span>
            </a>
          </li>
          {{-- <li>
            <a href="#">
              <i class='bx bx-cog'></i><span>Account Setting</span>
            </a>
          </li>           --}}
          <li>
            <a href="{{url('/logout')}}">
              <i class='bi bi-box-arrow-right' ></i><span>Sing Out</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
      {{-- <li class="nav-heading">Pages</li> --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#member-nav" data-bs-toggle="collapse" href="#">
          <i class='bi bi-person'></i><span>Member Details</span>
        </a>
        <ul id="member-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('member/add-member')}}">
              <i class='bx bx-user-plus'></i><span>Add New Member</span>
            </a>
          </li>
          <li>
            <a href="{{url('member/member-list')}}">
              <i class='bx bx-list-ul'></i><span>Member Lists</span>
            </a>
          </li>
          <li>
            <a href="{{url('member/add-member-payment')}}">
              <i class='bx bx-rupee' ></i><span>Add Member Payment</span>
            </a>
          </li>
          <li>
            <a href="{{url('member/member-payment-details')}}">
              <i class='bx bx-rupee' ></i><span>Member Payment Details</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('member/payment-details')}}">
          <i class="bi bi-currency-rupee"></i>
          <span>Welfare Payment Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#donation-nav" data-bs-toggle="collapse" href="#">
          <i class='bx bxs-donate-heart'></i><span>Donation Details</span>
        </a>
        <ul id="donation-nav" class="nav-content collapse ">
          <li>
            <a href="{{url('member/addnew-donation')}}">
              <i class='bx bx-bookmark-heart'></i><span>Add New Donation</span>
            </a>
          </li>
          <li>
            <a href="{{url('member/donation-details')}}">
              <i class='bx bx-list-ul'></i><span>Donation List</span>
            </a>
          </li>
        </ul>
      </li>      
      
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('member/users-details')}}">
          <i class='bx bxs-user'></i></i>
          <span>User Details</span>
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('member/contactus-details')}}">
          <i class="bi bi-telephone"></i>
          <span>Contact People Details</span>
        </a>
      </li> --}}
      
      <!-- End Profile Page Nav -->
      <!-- End Dashboard Nav -->

      

    </ul>

  </aside><!-- End Sidebar-->