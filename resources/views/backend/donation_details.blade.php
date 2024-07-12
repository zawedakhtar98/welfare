@extends('backend.layout.main')
@section('title') Donation Details- BR Islamic Admin/Member @endsection
@section('custom-internal-css')
    <style>
      td .donor-image{
        height: 100px;
        width: 100px;
      }
    </style>
@endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Donation Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Donation</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Given Amount</th>
                        <th scope="col">Receiver Image</th>
                        <th scope="col">Given Date</th>
                        <th scope="col">Given By</th>
                        <th scope="col">Payment Date</th>
                        <th scope="col">Transaction No</th>
                        <th scope="col">Payment Mode</th>
                        <th scope="col">Reason/Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1; @endphp
                      @foreach ($pay_list as $key=> $val)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{ucwords($val->name)}}</td>
                        <td>{{$val->mobile_no}}</td>
                        <td>{{$val->address}}</td>
                        <td><a href="{{url('backend_assets/img/donation_people_img/'.$val->image)}}" target="__blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to view full image">@php echo ($val->image) ? '<img src="'.url('backend_assets/img/donation_people_img/'.$val->image).'" class="donor-image"> ' : '-' @endphp</a></td>
                        <td>{{$val->given_amount}}</td>
                        <td>{{\Illuminate\Support\Carbon::parse($val->given_date)->format('d-m-y h:i:a')}}</td>
                        <td>{{$val->given_by_name}}</td>
                        <td>{{\Illuminate\Support\Carbon::parse($val->payment_date)->format('d-m-y h:i:a')}}</td>
                        <td>{{$val->transaction_no}}</td>
                        <td>{{$val->payment_mode}}</td>
                        <td>{{$val->description}}</td>
                      </tr>
                      @endforeach                          
                      @php $i+=1; @endphp
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