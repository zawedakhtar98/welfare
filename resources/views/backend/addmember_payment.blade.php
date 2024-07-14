@extends('backend.layout.main')
@section('title') Add Member Payment- BR Islamic Admin/Member @endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Add Member Payment</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Add Member Payment</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('member/save-member-payment')}}" method="post" class="p-3 row g-3" enctype="multipart/form-data">
                        @if (session('success'))
                        <div class="alert alert-success fs-14 py-2">{{session('success')}}</div>                      
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>  
                        @endif
                        @csrf
                        <div id="error_msg"></div>                          
                          <div class="col-md-6">
                            <select class="form-control" name="member_name" id="state">
                              <option selected>Select Member Name </option>
                              @foreach ($list as $val)
                              <option value="{{$val->id}}">{{ucwords($val->fname)." ".ucwords($val->lname)}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">@error('member_name'){{$message}}@enderror</span>
                          </div>  
                          <div class="col-md-6">
                            <select class="form-control" name="payment_mode">
                              <option selected>Select Payment Mode</option>
                              <option value="online">Online</option>
                              <option value="cash">Cash</option>
                            </select>
                            <span class="text-danger">@error('payment_mode'){{$message}}@enderror</span>
                          </div>  
                          <div class="col-md-6">
                            <input type="datetime-local" name="payment_date" value="{{old('payment_date')}}" placeholder="select Payment Date" class="datepicker form-control">
                            <span class="text-danger">@error('payment_date'){{$message}}@enderror</span>
                          </div> 
                          <div class="col-md-6">
                            <input type="number" name="amount" placeholder="Enter Amount" value="{{old('amount')}}" class="form-control">
                            <span class="text-danger">@error('amount'){{$message}}@enderror</span>
                          </div> 
                          <div class="col-md-12">
                            <select class="form-control" name="given_amount_to">
                              <option selected> Given Amount Of Person Name</option>
                              @foreach ($list as $val)
                              <option value="{{ucwords($val->fname.' '.$val->lname)}}">{{ucwords($val->fname)." ".ucwords($val->lname)}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">@error('given_amount_to'){{$message}}@enderror</span>
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
         setTimeout(function () {
          $('.alert').fadeOut('slow');
        }, 6000);

      </script>
  @endsection