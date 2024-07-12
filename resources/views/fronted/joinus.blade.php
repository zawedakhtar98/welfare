@extends('fronted.layout.main')

@section('title') Join Us @endsection

@section('main-section')

  
  <main>  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg mt-5">
        {{-- <div class="container" data-aos="fade-up">
          <div class="section-title">
            <p>Join Us / Register</p>
          </div>
        </div> --}}
        <div class="container h-100">         
          <div class="row justify-content-center align-items-center h-100 joinus">

                <div class="col-lg-8 col-md-12 col-sm-12">
                  <form action="{{url('save-member-user')}}" method="post" role="form" class="php-email-form">
                    <h4 class="sign-in text-center">Join Us / Register</h4>
                    @if (session('success'))
                    <div class="alert alert-success fs-14 py-2">{{session('success')}}</div>                      
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>  
                    @endif
                    @csrf
                    <div id="error_msg"></div>  
                    <div class="row mt-3">
                      <div class="col-md-6 form-group">
                        <input type="text" name="fname" value="{{old('fname')}}" class="form-control" id="fname" placeholder="Your First Name" autocomplete="off">
                        <span class="text-danger">@error('fname'){{$message}}@enderror</span>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="lname" value="{{old('lname')}}" id="lname" placeholder="Your Last Name" autocomplete="off">
                        <span class="text-danger">@error('lname'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Your Email" autocomplete="off">
                        <span class="text-danger">@error('email'){{$message}}@enderror</span>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="text" class="form-control" name="contact_no" value="{{old('contact_no')}}" id="contact_no" placeholder="Your Contact No" autocomplete="off">
                        <span class="text-danger">@error('contact_no'){{$message}}@enderror</span>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <select class="form-control" name="state" id="state">
                          <option value="0" selected>Select State Name</option>
                          @foreach ($state_list as $val)
                          <option value="{{$val->id}}">{{$val->name}}</option>
                          @endforeach
                        </select>
                        <span class="text-danger">@error('state'){{$message}}@enderror</span>
                      </div>
                      <div class="col-md-6 form-group mt-3 mt-md-0">
                        <select class="form-control" name="city" id="city_list">
                          <option selected>Select City Name</option>                          
                        </select>
                        <span class="text-danger">@error('city'){{$message}}@enderror</span>
                      </div>                      
                    </div>
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="permanent_address" rows="2" placeholder="Permanent Address">{{old('permanent_address')}}</textarea>
                      <span class="text-danger">@error('permanent_address'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mt-3">
                      <textarea class="form-control" name="living_address" rows="2" placeholder="Living Address">{{old('living_address')}}</textarea>
                      <span class="text-danger">@error('living_address'){{$message}}@enderror</span>
                    </div>
                    <div class="text-center mt-3">
                      <button type="submit" class="btn btn-bg-primary text-light fs-14 btn-hover">Submit Form</button>
                      <button type="reset" class="btn btn-bg-seconday text-light fs-14">Reset Forn</button>                     
                      <p class="not-join-text">Already have an account <a href="{{url('signin')}}">Sign In</a></p>                      
                    </div>
                  </form>
                </div>  
          </div>
        </div>
      </section>
      <!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection
  @section('custom-js')
      <script>
        $('#state').on('change',function(){
          let html = '<option value="0" selected>Select City Name</option>';
          let id = $(this).val();
          $('#city_list').html(html);
          $.ajax({
            url:"{{url('city-list')}}",
            type:'get',
            data:{state_id:id},
            success:function(res){
              if(Object.keys(res).length === 0){
                $('#city_list').html('<option value="0" selected>Select City Name</option><option>No City Found</option>');
              }
              else{
                res.forEach(city => {
                  html+= `<option value='${city.id}'>${city.name}</option>`;
                });
                $('#city_list').html(html);                
              }
            }
          })
        })

        setTimeout(function () {
          $('.alert').fadeOut('slow');
        }, 6000);

        $('#email').on('blur',function(){
          let email = $(this).val();
          let token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{url('duplicate-email-check')}}",
            type:'post',
            data:{email:email, _token:token},
            success:function(res){
              if(res.success){
                $('#error_msg').html('<div class="alert alert-danger fs-14 py-2">This email is already exist!</div>');
                setTimeout(function () {
                  $('.alert').fadeOut('slow');
                }, 6000);
                $('button[type="submit"]').attr('disabled','disabled');
              }
              else{
                $('button[type="submit"]').removeAttr('disabled');
              }
            }
          })
        })


      </script>
  @endsection