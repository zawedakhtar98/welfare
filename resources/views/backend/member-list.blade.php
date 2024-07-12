@extends('backend.layout.main')
@section('title') Member List - BR Islamic Admin/Member @endsection
@section('custom-internal-css')
    <style>
      .profile-img{
        width: 75px;
        height: 75px;
      }
    </style>
@endsection
@section('main-section')
<main id="main" class="main">
<div class="pagetitle">
    <h1>Member List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Member List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="container">
      <div class="row g-3">
        <div class="col-md-12">
            <div class="card   py-5">
                <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Father Name</th>
                        <th scope="col">Mother Name</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Alternate Contact No</th>
                        <th scope="col">Permanent Address</th>
                        <th scope="col">Living Address</th>
                        <th scope="col">Profile Image</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i=1;
                      @endphp
                      @foreach ($list as $val)                                                
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{ucwords($val->fname)}}</td>
                        <td>{{ucwords($val->lname)}}</td>
                        <td>{{ucwords($val->father_name)}}</td>
                        <th>{{ucwords($val->mother_name)}}</th>
                        <td>{{ucwords($val->contact_no)}}</td>
                        <td>{{$val->city->name}}</td>
                        <td>{{$val->state->name}}</td>
                        <td>{{$val->alter_contact_no}}</td>
                        <td>{{$val->permanent_address}}</td>
                        <td>{{$val->living_address}}</td>
                        <td>@php echo ($val->profile_img) ? '<img class="profile-img" src="'.asset('backend_assets/img/member_profile/'.$val->profile_img).'" alt="Not Uploaded">' : '-' @endphp</td>
                        <td> 
                        <a href="#"><i class='bx bx-edit-alt text-primary'></i></a>
                        <a href="#"><i class='bx bx-trash text-danger'></i></a>
                        </td>
                      </tr>
                      @php
                          $i++;
                      @endphp
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
       

      </script>
  @endsection