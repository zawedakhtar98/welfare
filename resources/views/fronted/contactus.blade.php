@extends('fronted.layout.main')

@section('title') Contact Us @endsection

@section('main-section')

  
  <main id="main">  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg mt-5">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            {{-- <h2>Contact</h2> --}}
            <p class="our-work-title">Contact Us</p>
          </div>
  
          <div class="row">
  
            <div class="col-lg-6">
  
              <div class="row">
                <div class="col-md-12">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@brwelfare.com <br>members@brwelfare.com</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>+91 91992 18873<br>+91 84336 91426</p>
                  </div>
                </div>
              </div>  
            </div>  
            <div class="col-lg-6">
              <form action="{{url('contact-us')}}" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-success fs-14 py-2">{{session('success')}}</div>                      
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>  
                    @endif
                    @csrf
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{old('name')}}" required>
                    <span class="text-danger fs-14">@error('name'){{$message}}@enderror</span>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{old('email')}}" required>
                    <span class="text-danger fs-14">@error('email'){{$message}}@enderror</span>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="mobile_no" id="subject" placeholder="Mobile No" value="{{old('mobile_no')}}" required>
                  <span class="text-danger fs-14">@error('mobile_no'){{$message}}@enderror</span>
                </div>                
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required>{{old('message')}}</textarea>
                  <span class="text-danger fs-14">@error('message'){{$message}}@enderror</span>
                </div>
                <div class="text-center mt-3"><button type="submit" class="btn btn-bg-primary text-light fs-14 btn-hover">Send Message</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection

  @section('custom-js')

  <script>
    setTimeout(function () {
        $('div.alert').fadeOut('slow');
      }, 3000);
  </script>    
  @endsection