@extends('backend.layout.main')
@section('title') Add Member - BR Islamic Admin/Member @endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Add Member</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Add Member</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('member/save-member')}}" method="post" class="p-3 row g-3" enctype="multipart/form-data">
                        @if (session('success'))
                        <div class="alert alert-success fs-14 py-2">{{session('success')}}</div>                      
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>  
                        @endif
                        @csrf
                        <div id="error_msg"></div>
                          <div class="col-md-6">
                            <input type="text" name="fname" value="{{old('fname')}}" class="form-control" id="fname" placeholder="First Name" autocomplete="off">
                            <span class="text-danger">@error('fname'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="lname" value="{{old('lname')}}" id="lname" placeholder="Last Name" autocomplete="off">
                            <span class="text-danger">@error('lname'){{$message}}@enderror</span>
                          </div>                         
                          <div class="col-md-6">
                            <input type="number" class="form-control" name="contact_no" value="{{old('contact_no')}}" id="contactno" placeholder="Contact No" autocomplete="off">
                            <span class="text-danger">@error('contact_no'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">
                            <input type="number" class="form-control" name="alternate_contact_no" value="{{old('alternate_contact_no')}}" placeholder="Alternate Contact No" autocomplete="off">
                            <span class="text-danger">@error('alternate_contact_no'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">
                            <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Email" autocomplete="off">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="father_name" value="{{old('father_name')}}"  placeholder="Father Name" autocomplete="off">
                            <span class="text-danger">@error('father_name'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" value="Self Employee" name="member_occupation" value="{{old('member_occupation')}}"  placeholder="Enter Member Occupation" autocomplete="off">
                            <span class="text-danger">@error('member_occupation'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="mother_name" value="{{old('mother_name')}}"  placeholder="Mother Name" autocomplete="off">
                            <span class="text-danger">@error('mother_name'){{$message}}@enderror</span>
                          </div>                          
                          <div class="col-md-4">
                            <input class="form-control" type="file" name="profile_image" id="formFile">
                            <span class="text-danger">@error('profile_image'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-4">
                            <select class="form-control" name="state" id="state">
                              <option value="0" selected>Select State Name</option>
                              @foreach ($state_list as $val)
                              <option value="{{$val->id}}" {{($val->name=='Bihar') ? 'selected' : ""}}>{{$val->name}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">@error('state'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-4">
                            <select class="form-control" name="city" id="city_list">
                              <option selected>Select City Name</option>                          
                            </select>
                            <span class="text-danger">@error('city'){{$message}}@enderror</span>
                          </div> 
                          <div class="col-md-12">
                          <textarea class="form-control" name="permanent_address" rows="2" placeholder="Permanent Address">Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118{{old('permanent_address')}}</textarea>
                          <span class="text-danger">@error('permanent_address'){{$message}}@enderror</span>
                        </div>                        
                        <div class="col-md-12">
                          <textarea class="form-control" name="living_address" rows="2" placeholder="Living Address">-{{old('living_address')}}</textarea>
                          <span class="text-danger">@error('living_address'){{$message}}@enderror</span>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary mt-3 col-md-3 col-sm-6 col-12">Submit Form</button>
                            <button type="reset" class="btn btn-secondary mt-3 col-md-2 col-sm-6 col-12">Reset Forn</button>                                                                                                                             
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
</main>    
@endsection

@section('custom-js')
      <script>
        function getCity(id){
            let html = '<option value="0" selected>Select City Name</option>';
              $('#city_list').html(html);
              $.ajax({
                url:"{{url('member/city-list')}}",
                type:'get',
                data:{state_id:id},
                success:function(res){
                  if(Object.keys(res).length === 0){
                    $('#city_list').html('<option value="0" selected>Select City Name</option><option>No City Found</option>');
                  }
                  else{
                    res.forEach(city => {
                      html+= `<option value='${city.id}' ${(city.name=='Muzaffarpur') ? 'selected' :''}>${city.name}</option>`;
                    });
                    $('#city_list').html(html);                
                  }
                }
              })
           }
        $(document).ready(function() {
           let state = $('#state').find('option:selected').val();
           getCity(state);
        });
        $('#state').on('change',function(){
          let id = $(this).val();
          getCity(id);
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
        $('#contactno').on('blur',function(){
          let mobile = $(this).val();
          let token = $('input[name="_token"]').val();
          $.ajax({
            url:"{{url('duplicate-mobile-check')}}",
            type:'post',
            data:{mobile:email, _token:token},
            success:function(res){
              if(res.success){
                $('#error_msg').html('<div class="alert alert-danger fs-14 py-2">This mobile is already exist!</div>');
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