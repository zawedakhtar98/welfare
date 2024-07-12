@extends('fronted.layout.main')

@section('title') Our Work @endsection

@section('main-section')

  

  <main id="main">

       <!-- ======= Our work Section ======= -->
       <section id="services" class="services mt-5">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            {{-- <h2>Services</h2> --}}
            <p class="our-work-title">Our Work</p>
          </div>

          <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-male-female"></i></div>
                <h4><a href="">Poor Parent Daughter Wedding help</a></h4>
                <p>In our village many of poor parent tens about her daughter wedding so we understand the emotional and financial challenges parents face when their daughters are getting married. Our initiative was born out of a deep desire to ease this burden and ensure that every parent can witness their daughter's special day with pride and happiness.</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class='bx bxs-shield-plus'></i></div>
                <h4><a href="">Crisis Intervention</a></h4>
                <p>Our mission is to provide compassionate and effective support to individuals and families in crisis or if someone get syrious seek and financial condition is not well will help them for get better.</p>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4><a href="">Free Flow Finance</a></h4>
                <p> We're on a mission to demystify finance and make it accessible to everyone. Our team of experts is passionate about helping individuals take control of their finances, break free from debt, and build wealth for the future. </p>
              </div>
            </div>
          </div>

        </div>
      </section><!-- Our work Section -->

  </main><!-- End #main -->

  @endsection