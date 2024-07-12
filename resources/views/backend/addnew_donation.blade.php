@extends('backend.layout.main')
@section('title') Add New Donation  - BR Islamic Admin/Member @endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Add New Donation Details</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{url('member/donation-details')}}">Donation Details</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('member/addnew-donation')}}" method="post" class="p-3 row g-3" enctype="multipart/form-data">
                        @if (session('success'))
                        <div class="alert alert-success fs-14 py-2">{{session('success')}}</div>                      
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>  
                        @endif
                        @csrf
                        <div id="error_msg"></div>
                          <div class="col-md-6">
                            <input type="text" name="name" value="{{old('name')}}" class="form-control"  placeholder="Enter receiver name " autocomplete="off">
                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                          </div>                        
                          <div class="col-md-6">
                            <input type="number" class="form-control" name="mobile_no" value="{{old('mobile_no')}}" placeholder="Enter receiver mobile" autocomplete="off">
                            <span class="text-danger">@error('mobile_no'){{$message}}@enderror</span>
                          </div>                          
                          <div class="col-md-6">
                            <select name="payment_mode" class="form-control">
                              <option value="">Select Payment Mode</option>
                              <option value="online">Online</option>
                              <option value="cash">Cash</option>
                              <option value="check">Check</option>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="given_amount" value="{{old('given_amount')}}"   placeholder="Enter given amount" autocomplete="off">
                            <span class="text-danger">@error('given_amount'){{$message}}@enderror</span>
                          </div> 
                          <div class="col-md-6">
                            <input type="number" class="form-control" name="aadhaar_no" value="{{old('aadhaar_no')}}" placeholder="Enter receiver aadhar no" autocomplete="off">
                            <span class="text-danger">@error('aadhaar_no'){{$message}}@enderror</span>
                          </div> 
                          <div class="col-md-6">
                            <input class="form-control" type="file" name="receiver_image" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload receiver image">
                            <span class="text-danger">@error('receiver_image'){{$message}}@enderror</span>
                          </div> 
                          <div class="col-md-12">                            
                            <textarea name="address" class="form-control" cols="15" rows="2" placeholder="Enter full address of receiver" autocomplete="off">{{old('address')}}</textarea>
                            <span class="text-danger">@error('address'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">
                            <select name="given_by" class="form-control">
                              <option value="">Given By</option>
                              @foreach ($list as $val)
                              <option value="{{$val->id}}">{{ucwords($val->fname)." ".ucwords($val->lname)}}</option>
                              @endforeach
                            </select>
                            <span class="text-danger">@error('given_by'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-6">  
                            <input type="datetime-local" name="given_date" class="form-control" value="{{old('given_date')}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Given Date and time">
                            <span class="text-danger">@error('given_date'){{$message}}@enderror</span>
                          </div>
                          <div class="col-md-12">                            
                            <textarea name="description" class="form-control" cols="15" rows="2" placeholder="Enter short description about receiver or reason for given" autocomplete="off">{{old('description')}}</textarea>
                            <span class="text-danger">@error('description'){{$message}}@enderror</span>
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


      </script>
  @endsection