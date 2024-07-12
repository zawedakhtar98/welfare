@extends('fronted.layout.main')
@section('title') Verify Email @endsection
@section('custom-internal-css')
    <style>
      span .bx.bx-smile{
        font-size:70px;
      }
      .thank-text{
        font-weight: 600;
        font-family: sans-serif;
      }
      h4.slogan{
        font-size: 20px;
        font-family: sans-serif;
      }
      
    </style>
@endsection
@section('main-section')  
  <main>  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg mt-5 contact-section">  
        <div class="container h-100" data-aos="fade-up"> 
          <div class="row justify-content-center align-items-center h-100">
            <div class="php-email-form col-lg-6 col-md-8 col-sm-11 text-center col-11">
              <span><i class='bx bx-smile text-s-color'></i></span>
                <h1 class="text-p-color thank-text">Thank you!</h1>

                <h4 class="text-p-color slogan">For {{(session() && session('is_saved')=='1') ? "Joining" : "contacting"}} us. Our team will get back to you soon.</h4>
            </div>  
          </div>
        </div>
      </section><!-- End Contact Section -->
  </main><!-- End #main -->
  @endsection
@section('custom-js')
<script type="text/javascript">
  setTimeout(function() {
      window.location.href = '{{ url('') }}';
  }, 3000);
</script>
@endsection