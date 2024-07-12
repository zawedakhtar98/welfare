@extends('fronted.layout.main')

@section('title') Verify Email @endsection

@section('main-section')

  
  <main>  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg mt-5">  
        <div class="container h-100" data-aos="fade-up"> 
          <div class="row justify-content-center align-items-center h-100">
                <div class="col-lg-6 col-md-8 col-sm-8 php-email-form">                    
                    <div class="row mt-3">
                      <div class="col-md-10 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email OTP" required>
                      </div>
                      <p class="col-md-2 fs-18 mb-0 mt-2 p-0"><span class="text-info" id="timer">2:00</span></p>
                    </div>
                    <div class="form-group mt-4">
                      <div class="text-center"><button type="submit" class="btn btn-bg-primary text-light fs-14 btn-hover">Verify Opt</button></div>
                    </div>
                </div>  
          </div>
        </div>
      </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection

  @section('custom-js')
      <script>
          function startTimer(duration, display) {
          let timer = duration, minutes, seconds;
          const interval = setInterval(() => {
              minutes = parseInt(timer / 60, 10);
              seconds = parseInt(timer % 60, 10);

              minutes = minutes < 10 ? "0" + minutes : minutes;
              seconds = seconds < 10 ? "0" + seconds : seconds;

              display.textContent = minutes + ":" + seconds;

              if (--timer < 0) {
                  clearInterval(interval);
                  display.textContent = "Resend OTP";
              }
          }, 1000);
      }

      // Start the timer when the page loads
      window.onload = () => {
          const twoMinutes = 60 * 2;
          const display = document.querySelector('#timer');
          startTimer(twoMinutes, display);
      };

      </script>
  @endsection