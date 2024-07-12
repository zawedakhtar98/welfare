@extends('backend.layout.main')
@section('title') Member Payment Details- BR Islamic Admin/Member @endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Member Payment Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Member Payment Details</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
          
            <div class="card">
                <p class="ms-auto">
                    <button class="btn btn-primary m-4" type="button" data-bs-toggle="collapse" data-bs-target="#filter_section" aria-expanded="false" aria-controls="filter_section">
                      Filter
                    </button>
                  </p>                  
                <div class="card-body">
                  <div class="collapse mb-4" id="filter_section">
                    <form action="#">
                      <div class="row">
                        <div class="col-md-3">
                          <input type="text" name="mbr_trans" placeholder="Member or Transaction" class="form-control">
                        </div>
                        <div class="col-md-3">
                         <select name="member_name" class="form-control">
                          <option>Select Member</option>
                          <option>Select Member</option>
                         </select>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group d-flex">
                            <input type="date" name="from_date" class="form-control mr-2">    
                            <label for="">To</label>                    
                            <input type="date" name="to_date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-3">
                          <select name="member_name" class="form-control">
                           <option>Select Payment Mode</option>
                           <option>Select Member</option>
                          </select>
                         </div>
                        <div class="col-md-3">
                          <input type="submit" value="Submit" name="filter" class="btn btn-primary w-100">
                        </div>
                      </div>
                    </form> 
                  </div>                
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Member Name</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Mother Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Amount Given To</th>
                        <th scope="col">Payment Mode</th>
                        <th scope="col">Transaction Number</th>
                        <th scope="col">Payment Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $i=1;
                      @endphp
                      @foreach ($member as $dtl)
                          
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{ucwords($dtl->user->fname." ".$dtl->user->lname)}}</td>
                        <td>{{($dtl->user->father_name) ? $dtl->user->father_name : '-'}}</td>
                        <td>{{($dtl->user->mother_name) ? $dtl->user->mother_name : '-'}}</td>
                        <td>{{$dtl->amount}}</td>
                        <td>{{($dtl->amt_given_to) ? $dtl->amt_given_to : '-'}}</td>
                        <td>{{$dtl->payment_mode}}</td>
                        <td>{{$dtl->transaction_no}}</td>
                        <td>{{date('d-m-Y',strtotime($dtl->payment_date))}}</td>
                      </tr>
                      @php $i++;@endphp
                      @endforeach
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