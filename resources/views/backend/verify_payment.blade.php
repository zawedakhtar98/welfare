@extends('backend.layout.main')
@section('title') Verify Member Payment- BR Islamic Admin/Member @endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Verify Member Payment</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Verify Payment</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <div class="table-responsive py-5">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Member Name</th>
                        <th scope="col">Paid Amount</th>
                        <th scope="col">Payment Date & Time</th>
                        <th scope="col">Screenshot Image</th>
                        <th scope="col">Verify Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php $i=1;  @endphp 
                      @if(count($payment)>0) 
                     @php
                        //  var_dump($payment);
                     @endphp                      
                      @foreach ($payment as $val)                          
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{ucwords($val->user->fname . " ".$val->user->lname)}}</td>
                        <td>{{$val->paid_amount}}</td>
                        <td>{{ \Illuminate\Support\Carbon::parse($val->created_date)->format('d-m-Y h:i:a') }}</td>
                        <td><a href="{{url('backend_assets/img/payment_screenshot/'.$val->uploaded_img)}}" target="__blank" class="ps-5"><i class="bi bi-eye view-img"></i></a></td>                        
                        <td class="ps-2 {{($val->status=='verify') ? 'text-success' : 'text-danger'}}">{{ucwords($val->status)}}</td>
                        <td>
                          <span>
                            <span class="cancel_icon" data-bs-toggle="modal" data-bs-target="#cancel_modal" data-user_pay_dtl="{{$val->member_id."#".$val->paid_amount."#".$val->id}}"><i class='bx bx-window-close text-danger'></i></span>
                            <span class="check_icon" data-bs-toggle="modal" data-bs-target="#check_modal" data-user_pay_dtl="{{$val->member_id."#".$val->paid_amount."#".$val->id}}"><i class='bx bxs-checkbox-checked text-success'></i></span>
                          </span>
                        </td>
                      </tr>
                      @endforeach
                      @php $i++;  @endphp                          
                      @else
                        <tr><td colspan="7" class="text-center">No record found</td></tr>
                      @endif
                    </tbody>
                  </table>                   
                </div>   
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
  <div class="modal fade" id="cancel_modal" tabindex="-1" aria-labelledby="cancel_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="cancel_modalLabel">Cancel Member Payment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#">
          @csrf
          <div class="modal-body">
            <div id="cancel_modal_msg"></div>
              <div class="form-group">
                <label for="">Remark</label>
                <input type="text" name="remark" placeholder="Enter remark" class="form-control">
                <input type="hidden" value="{{session('user_id')}}" name="action_by">
                <input type="hidden" name="member_pay_dtl" id="member_pay_cancel">
                <input type="hidden" name="status" value="0">
              </div>              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="check_modal" tabindex="-1" aria-labelledby="check_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="check_modalLabel">Verify Member Payment</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#">
          @csrf
        <div class="modal-body">
          <div id="verify_modal_msg"></div>
            <div class="form-group">
              <label for="">Remark</label>
              <input type="text" name="remark" placeholder="Enter remark" class="form-control">
              <input type="hidden" value="{{session('user_id')}}" name="action_by">
              <input type="hidden"  name="member_pay_dtl" id="member_pay_verify">
              <input type="hidden" name="status" value="1">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>    
@endsection

@section('custom-js')
      <script>
        $('.cancel_icon, .check_icon').on('click',function(){
          let member_pay_dtl = $(this).data('user_pay_dtl');
          // alert(member_pay_dtl);return false;
          $('#member_pay_cancel').val(member_pay_dtl);
          $('#member_pay_verify').val(member_pay_dtl);
        })

        $('#cancel_modal form').on('submit',function(e){
          e.preventDefault();
          let fdata = $(this).serialize();
          $.ajax({
            url:"{{url('member/verify-payments')}}",
            type:'post',
            data:$(this).serialize(),
            success:function(res){
              if(res.status){
                $('#cancel_modal_msg').html('<div class="alert alert-success" role="alert">'+res.msg+'</div>');
                setTimeout(redirect, 2000);
              }
              else{
                $('#cancel_modal_msg').html('<div class="alert alert-danger" role="alert">'+res.msg+'</div>')
              }
            }
          });
        });

        $('#check_modal form').on('submit',function(e){
          e.preventDefault();
          $.ajax({
            url:"{{url('member/verify-payments')}}",
            type:'post',
            data:$(this).serialize(),
            success:function(res){
              if(res.status){
                $('#verify_modal_msg').html('<div class="alert alert-success" role="alert">'+res.msg+'</div>');
                setTimeout(redirect, 2000);
              }
              else{
                $('#verify_modal_msg').html('<div class="alert alert-danger" role="alert">'+res.msg+'</div>')
              }
            }
          });
        })
        function redirect() {
            window.location.href = '{{ url("member/verify-payments") }}';
        }

        setTimeout(function () {
          $('.alert').fadeOut('slow');
        }, 6000);

        

      </script>
  @endsection