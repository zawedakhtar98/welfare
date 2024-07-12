@extends('backend.layout.main')
@section('title') Dashboard - BR Islamic Admin/Member @endsection
  @section('main-section')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">              
                <a href="{{url('member/member-list')}}">
                <div class="card-body">
                  <h5 class="card-title">Total Member</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$no_of_member}}</h6>
                    </div>
                  </div>
                </div>
                </a>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <a href="{{url('member/payment-details')}}">
                <div class="card-body">
                  <h5 class="card-title">Total Amount</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-rupee"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$avail_bal}}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div><!-- End Revenue Card -->
            <!-- Helped People Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <a href="{{url('member/donation-details')}}">
                <div class="card-body">
                  <h5 class="card-title">Total Helped People</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-heart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$no_donation}}</h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div><!-- End Help people Card -->
            

            
            
          </div>
        </div><!-- End Left side columns -->

        

      </div>
    </section>

  </main><!-- End #main -->
  @endsection

 