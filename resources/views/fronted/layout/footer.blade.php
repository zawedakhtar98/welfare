 {{-- founder section start --}}
 <section class="bg-white founder">
  <div class="container founder-section">
    <h2>Our Founders</h2>
    <div class="row justify-content-center">
      <div class="col-4 col-sm-4 col-md-4 founder">
        <img src="{{url('fronted_assets/img/team/ladhale.png')}}" alt="Hisham VM">
        <h5>Md. Ladhale</h5>
        <p>Founder & Member</p>
      </div>
      <div class="col-4 col-sm-4 col-md-4 founder">
        <img src="{{url('fronted_assets/img/team/danish.png')}}" alt="Jahfar TT">
        <h5>Md. Danish</h5>
        <p>Founder & Member</p>
      </div>
      <div class="col-4 col-sm-4 col-md-4 founder">
        <img src="{{url('fronted_assets/img/team/faruk.png')}}" alt="Abdul Rasheed PP">
        <h5>Md. Farook</h5>
        <p>Founder & Member</p>
      </div>      
    </div>
  </div>
</section>
{{-- founder section end --}}
<!-- ======= Footer ======= -->
  <footer id="footer">
  <div class="container d-flex flex-wrap border-bottom py-1">
    <div class="col-md-12 d-flex align-items-center">
      <p class="text-light text-center w-100 m-1 fs-12 footer-m-p"><strong>Address:-</strong> Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118.</p>
    </div>
  </div>
  <div class="container d-flex flex-wrap justify-content-between align-items-center mt-2">  
      <div class="col-md-5">
        <p class="text-light w-100 m-0 fs-12 footer-m-p">© {{date("Y")}} Copyright B R Islamic Welfare. All Rights Reserved</p>
        <p class="design-by m-0 fs-12 footer-m-p">Designed by <span class="text-warning">BR Team</span></p>
      </div>
      
  
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-light fs-4" href="#"><i class='bx bxl-facebook-circle'></i></a></li>
        <li class="ms-3"><a class="text-light fs-4" href="#"><i class='bx bxl-instagram'></i></a></li>
        <li class="ms-3"><a class="text-light fs-4" href="#"><i class='bx bxl-twitter'></i></a></li>
      </ul>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{url('fronted_assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{url('fronted_assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('fronted_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('fronted_assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('fronted_assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('fronted_assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <script type="text/javascript">
    function googleTranslateElementInit() {
       new google.translate.TranslateElement({
          pageLanguage: 'en', layout: 
          google.translate.TranslateElement.InlineLayout.HORIZONTAL, autoDisplay: 
          false, includedLanguages: 'en,hi,ur,ar', gaTrack: true, gaId: 'YOUR_API_KEY'
          }, 'main');
    }
 </script>
 <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <!-- Template Main JS File -->
  <script src="{{url('fronted_assets/js/main.js')}}"></script>
  @yield('custom-js')

  


</body>

</html>