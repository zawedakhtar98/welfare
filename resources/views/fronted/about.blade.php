@extends('fronted.layout.main')

@section('title') About Us @endsection

@section('main-section')

<main id="main">
  <!-- ======= About Section ======= -->
<section id="about" class="section-bg mt-5">
  <div class="container mt-5" data-aos="fade-up">
    <div class="section-title">
      {{-- <h2>About</h2> --}}
      <p>About Us</p>
    </div>

    <div class="row content">
      <div class="col-lg-12">
        <p><strong>Welcome to B R Islamic Welfare</strong></p>
        <p class="text-start text-justify">          
          Founded in 2022, <strong>B R Islamic Welfare</strong> is a dedicated organization committed to fostering the principles of compassion, support, and community engagement inspired by Islamic values. Our mission is to provide essential services, promote education, and support the well-being of individuals and families within our community.
        </p>
      </div>
      <div class="col-lg-12 pt-4 pt-lg-0">
        <p><strong>Our Mission</strong></p>
        <p class="m-0">At B R Islamic Welfare, our mission is to:</p>
        <p class="text-start text-justify">
          
          Support the Needy: Offer financial assistance, food distribution, and essential resources to individuals and families in need.
          Promote Education: Provide educational programs and scholarships to empower the youth and adults, fostering a knowledgeable and enlightened community.
          Enhance Well-being: Organize health camps, counseling services, and recreational activities to promote physical, mental, and emotional well-being.
        </p>
        <p class="mt-5">For more information about our programs, volunteering opportunities, or how you can support B R Islamic Welfare, please reach out to us: <a href="{{url('contact-us')}}">contact us</a></p>
      </div>
    </div>
  </div>
</section> <!-- End About Section --> 
</main>
@endsection