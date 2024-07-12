@extends('backend.layout.main')
@section('title') Users Details- BR Islamic Admin/Member @endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Users Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Users Details</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <div class="card-title">
                  Users Details
                </div> 
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Alternate Contact No</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                        <td>test</td>
                      </tr>
                    </tbody>
                  </table>                   
                </div>   
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
        $('#state').on('change',function(){
          let html = '<option value="0" selected>Select City Name</option>';
          let id = $(this).val();
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