@extends('backend.layout.main')
@section('title') Pay For Welfare- BR Islamic Admin/Member @endsection
@section('main-section')
@section('custom-internal-css')
    <style>
      
    </style>
@endsection
<main id="main" class="main">
<div class="pagetitle">
    <h1>Pay for welfare</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Welfare</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">          
            <div class="card"> 
              <div class="card-body">
              <div class="py-2 mt-5 w-100">
                  <p class="info"><strong class="text-danger">Note:</strong> Please upload the screenshot after depositing the amount.Click on this <a href="{{url('member/upload-screenshot')}}">link</a> for  upload screenshot.</p>
                  <p class="info"><strong class="text-danger">Note:</strong> बराये मेहरबान पैसा डालने के बाद स्क्रीनशॉट अपलोड कीजिये. स्क्रीनशॉट अपलोड करने के लिए इस <a href="{{url('member/upload-screenshot')}}">लिंक </a>पर क्लिक करे.</p>
                </div>
                <div class="text-center py-3">
                  <img src="{{url('backend_assets/img/scanner/scanner.jpg')}}" class="rounded-circle scanner-img" alt="...">   
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