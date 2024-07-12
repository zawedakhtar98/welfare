@extends('fronted.layout.main')

@section('title') Home Page @endsection
@section('custom-internal-css')
    <style>
 .card {
  overflow: hidden;
  background: rgb(238, 174, 202);
  background: radial-gradient(
    circle,
    rgba(238, 174, 202, 1) 0%,
    rgba(148, 187, 233, 1) 100%
  );
 .card-img {
    height: 20rem;
  }
 .card-img-container img {
    object-fit: cover;
    object-position: center;
    max-height: 100%;
    height: 20rem;
  }
 .card-img-overlay {
    color: #fff;
    font-weight: bold;
    text-shadow: 0 0 3px #ff0000, 0 0 5px #0000ff;
  }
}

/* small and extra-small screens */
@media (max-width: 767px) {
 .carousel-inner .carousel-item > div {
    display: none;
    &:first-child {
      display: block;
    }
   .card-img-container img {
      max-width: 100%;
    }
  }
}

/* medium and up screens */
@media (min-width: 768px) {
   .carousel-inner {
    .carousel-item-end.active,
    .carousel-item-next {
      transform: translateX(25%);
    }
    .carousel-item-start.active,
     .carousel-item-prev {
      transform: translateX(-25%);
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
      display: flex;
    }
     .carousel-item-end,
     .carousel-item-start {
      transform: translateX(0);
    }
  }
  .card-img-container {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    img {
      display: inline-block;
      max-height: 100%;
      margin: 0 -50%;
    }
  }
}

    </style>
@endsection

@section('main-section')

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Balthi Rasoolpur Islamic Welfare</span></h2>
              <p class="animate__animated animate__fadeInUp">Our mission to help our Ummah to fulfill there dream. For better education or any other need we will stand with him always.</p>
              {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{url('fronted_assets/img/banner/slide-1.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Front View Of Jama Masjid</h2>
              <p class="animate__animated animate__fadeInUp">This is our village Jama Masjid and this is front view. </p>
              {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{url('fronted_assets/img/banner/slide-2.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Inner View Of Jama Masjid</h2>
              <p class="animate__animated animate__fadeInUp">This is our village Jama Masjid and this is inner view.</p>
              {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
            </div>
          </div>
        </div>

        <!-- Slide 4 -->
        <div class="carousel-item" style="background-image: url({{url('fronted_assets/img/banner/slide-3.jpg')}})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Madarsa Rafaqat Uloom</h2>
              <p class="animate__animated animate__fadeInUp">This is our village Madarsha and here above 30 children studing of Hafizul Quran.</p>
              {{-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> --}}
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

    <!-- ======= Our work Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          {{-- <h2>Services</h2> --}}
          <p>Our Work</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-stretch our-work-tab" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-male-female"></i></div>
              <h4><a href="">Poor Parent Daughter Wedding help</a></h4>
              <p>In our village many of poor parent tens about her daughter wedding so we understand the emotional and financial challenges parents face when their daughters are getting married. Our initiative was born out of a deep desire to ease this burden and ensure that every parent can witness their daughter's special day with pride and happiness.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-stretch our-work-tab mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class='bx bxs-shield-plus'></i></div>
              <h4><a href="">Crisis Intervention</a></h4>
              <p>Our mission is to provide compassionate and effective support to individuals and families in crisis or if someone get syrious seek and financial condition is not well will help them for get better.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-stretch our-work-tab mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Free Flow Finance</a></h4>
              <p> We're on a mission to demystify finance and make it accessible to everyone. Our team of experts is passionate about helping individuals take control of their finances, break free from debt, and build wealth for the future. </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- Our work Section -->

     {{-- Team Section --}}
     <section class="team pt-0">
      <div class="container my-3">
        <div class="section-title">
          <p>Our Members</p>
        </div>
        <div class="row">
          <div class="row mx-auto my-auto justify-content-center">
            <div id="myCarousel" class="carousel team-carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="col-md-3">
                    <div class="member">
                      <img src="{{url('fronted_assets/img/team/faruk.png')}}" class="img-fluid" alt="">
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4>Md Farook</h4>
                          <span>Founder & Member</span>
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
                </div>
                <div class="carousel-item">
                  <div class="col-md-3">
                    <div class="member">
                      <img src="{{url('fronted_assets/img/team/danish.png')}}" class="img-fluid" alt="">
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4>Md Danish</h4>
                          <span>Founder & Member</span>
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
                </div>
                <div class="carousel-item">
                  <div class="col-md-3">
                    <div class="member">
                      <img src="{{url('fronted_assets/img/team/ladhale.png')}}" class="img-fluid" alt="">
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4>Md Ladhale</h4>
                          <span>Founder & Member</span>
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
                </div>
                <div class="carousel-item">
                  <div class="col-md-3">
                    <div class="member">
                      <img src="{{url('fronted_assets/img/team/neyaz.png')}}" class="img-fluid" alt="">
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4>Md Neyaz</h4>
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
                </div>
                <div class="carousel-item">
                  <div class="col-md-3">
                    <div class="member">
                      <img src="{{url('fronted_assets/img/team/ibne.png')}}" class="img-fluid" alt="">
                      <div class="member-info">
                        <div class="member-info-content">
                          <h4>Ibne Ali</h4>
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
                </div>
              </div>
              <a class="carousel-control-prev bg-transparent w-aut" href="#myCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next bg-transparent w-aut" href="#myCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="visible" class="d-none d-md-block"></div>
    </section>
    {{-- End Team Section --}}

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          {{-- <h2>Our All Members</h2> --}}
          <p>Check Members Details</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{url('fronted_assets/img/testimonials/faruk.png')}}" class="testimonial-img" alt="">
                  <h3>Md Farook</h3>
                  <h4>Founder & Member</h4>
                  <div class="row mt-3">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Contact No:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">+91 84336 91426</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Occupation:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">Self Employee</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Permanent Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Vill -  Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Living Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Sion Dharavi, Mumbai Maharashtra</p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{url('fronted_assets/img/testimonials/danish.png')}}" class="testimonial-img" alt="">
                  <h3>Md Danish</h3>
                  <h4>Founder & Member</h4>
                  <div class="row mt-3">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Contact No:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">+91 91992 18873</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Occupation:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">Machanical Engineer</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Permanent Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Vill -  Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Living Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Telangana,Karnatka</p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{url('fronted_assets/img/testimonials/ladhale.png')}}" class="testimonial-img" alt="">
                  <h3>Md. Ladhale</h3>
                  <h4>Founder & Member</h4>
                  <div class="row mt-3">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Contact No:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">+91 6205 190 327</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Occupation:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">Business Man</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Permanent Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Vill -  Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Living Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118</p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{url('fronted_assets/img/testimonials/neyaz.png')}}" class="testimonial-img" alt="">
                  <h3>Md. Neyaz Ahmad</h3>
                  <h4>Member</h4>
                  <div class="row mt-3">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Contact No:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">+91 70798 90898</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Occupation:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">Self Employee</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Permanent Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Vill -  Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Living Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Madgaon, Goa</p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="{{url('fronted_assets/img/testimonials/ibne.png')}}" class="testimonial-img" alt="">
                  <h3>Ibne Ali</h3>
                  <h4>Member</h4>
                  <div class="row mt-3">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Contact No:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">+91 85789 46282</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Occupation:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0">Safety Officer</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Permanent Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">Vill -  Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118</p>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-5">
                      <p class="m-0 p-0"><b>Living Address:</b></h6>
                    </div>
                    <div class="col-md-7">
                      <p class="m-0 p-0 text-justify">--</p>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts pb-4">
      <div class="container">
        <div class="row">
            <div class="four col-md-4 col-4 col-sm-4">
                <div class="counter-box"> <i class="bx bxs-group"></i><span class="counter">33</span>
                    {{-- <p>Total Members</p> --}}
                </div>
            </div>
            <div class="four col-md-4 col-4 col-sm-4">
                <div class="counter-box"><i class="bx bxs-user-plus"></i><span class="counter">10</span>
                    {{-- <p>Total Users</p> --}}
                </div>
            </div>
            <div class="four col-md-4 col-4 col-sm-4">
                <div class="counter-box"> <i class="bx bxs-donate-heart"></i><span class="counter">0</span>
                    {{-- <p>Helped People</p> --}}
                </div>
            </div>
        </div>
    </div>
    </section><!-- End Counts Section -->
   
  @endsection 
  @section('custom-js')
  <script>
    $(document).ready(function() {

      $('.counter').each(function () {
        $(this).prop('Counter',0).animate({
        Counter: $(this).text()
        }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
        $(this).text(Math.ceil(now));
        }
        });
      });

          function initCarousel() {
            if ($("#visible").css("display") == "block") {
              $(".carousel.team-carousel .carousel-item").each(function () {
                var i = $(this).next();
                i.length || (i = $(this).siblings(":first")),
                  i.children(":first-child").clone().appendTo($(this));

                for (var n = 0; n < 4; n++)
                  (i = i.next()).length || (i = $(this).siblings(":first")),
                    i.children(":first-child").clone().appendTo($(this));
              });
            }
          }
          $(window).on({
            resize: initCarousel(),
            load: initCarousel()
          });
        });

  </script>
  @endsection

  