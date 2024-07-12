@extends('fronted.layout.main')

@section('title') Sign In @endsection

@section('main-section')

  
  <main>  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg mt-5">        
        <div class="container h-100">         
          <div class="row justify-content-center align-items-center h-100 login-page">

                <div class="col-lg-6 col-md-6 col-sm-12">
                  <form action="{{url('check-user')}}" method="post" role="form" class="php-email-form">  
                    
                    @if(session('error'))
                        <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>  
                    @endif

                    @csrf
                    
                    <h4 class="text-center sign-in">Sign In </h4>  
                    <div class="row mt-3">
                      <div class="col-md-12 form-group">
                        <input type="text" name="username" value="{{old('username')}}" class="form-control" id="username" placeholder="Enter your email.." autocomplete="off">
                        <span class="text-danger">@error('username'){{$message}}@enderror</span>
                      </div>                      
                    </div>  
                    <div class="row mt-3">
                      <div class="col-md-12 form-group">
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Enter your password" autocomplete="off">
                        <a href="#" class="forgot-pass">Forgot Password?</a>
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                      </div>
                    </div>                  
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-block btn-bg-primary text-light fs-14 btn-hover">Sign in</button>                                             
                      <p class="not-join-text">Don`t have account? <a href="{{url('joinus')}}">Join Us</a></p>                      
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
        }, 3000);

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
                }, 3000);
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