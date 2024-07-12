@extends('backend.layout.main')
@section('title') Upload Screenshot- BR Islamic Admin/Member @endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Upload Screenshot</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Upload Screenshot</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('member/upload-screenshot')}}" method="post" class="py-5 row g-3" enctype="multipart/form-data">
                        @if (session('success'))
                        <div class="alert alert-success fs-14 py-2">{{session('success')}}</div>                      
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger fs-14 py-2">{{session('error')}}</div>  
                        @endif
                        @csrf
                        <div id="error_msg"></div> 
                        <div class="row">
                          <div class="col-md-12">
                            <p class="info2 "><strong class="text-danger">Note:</strong> Please upload the screenshot which one you have deposited into the welfare.</p>
                            <p class="info2 mb-5"><strong class="text-danger">Note:</strong> बराये मेहरबान वह स्क्रीनशॉट अपलोड करें जिसे आपने ट्रस्ट में जमा किया है|</p>
                          </div>
                          <div class="col-md-4">
                            <label for=""  class="label">Amount</label>
                            <input class="form-control" type="text" name="amount" placeholder="Amount" id="formFile">                            
                            <span class="text-danger">@error('amount'){{$message}}@enderror</span>
                          </div>            
                          <div class="col-md-4">
                            <label for="" class="label">Upload Screenshot</label>
                            <input class="form-control" type="file" name="screenshot">
                            <span class="text-danger">@error('screenshot'){{$message}}@enderror</span>
                            <span class="text-danger"></span>
                          </div>            
                          
                           <div class="col-md-4 mt-4">
                            <label for="">&nbsp;</label>
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                            <button type="reset" class="btn btn-secondary">Reset Forn</button>                                                                                                                             
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