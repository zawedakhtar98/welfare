@extends('fronted.layout.main')

@section('title')Our Members @endsection
@section('custom-internal-css')
    <style>
      @media (max-width: 768px) {
        .team .member{
          padding: unset;
        }
        .our-member-title{
          margin-top: 40px !important;
        }
      }
    </style>
@endsection

@section('main-section')

  

  <main id="main">

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          {{-- <h2>Team</h2> --}}
          <p class="our-member-title"> our Members</p>
        </div>

        <div class="row">
          @foreach($user as $k=> $usr)
          <div class="col-xl-3 col-lg-4 col-md-6 col-6 col-sm-6">
            <div class="member">
              <img src="{{url('backend_assets/img/member_profile/'.$usr->profile_img)}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{ucwords($usr->fname." ".$usr->lname)}}</h4>
                  <span>Member</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
            @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  @endsection