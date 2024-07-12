@extends('fronted.layout.main')

@section('title') Home Page @endsection

<style>
  .video-title {
      background-color: #d6b3f0;
      text-align: center;
      padding: 10px;
      margin-bottom: 10px;
  }
  .video-container {   
    background: #fefefe;
    box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
    border-top-left-radius: 3%;
    border-top-right-radius: 3%;
    border-bottom-left-radius: 3%;
    border-bottom-right-radius: 3%;
  }
  .video-container:hover{
    background: #071527;
    color: white;    
    border-bottom-left-radius: 3%;
    border-bottom-right-radius: 3%;
  }
  .video-container iframe{
    width: 100%;
    border-bottom-left-radius: 3%;
    border-bottom-right-radius: 3%;
    border-top-left-radius: 3%;
    border-top-right-radius: 3%;
  }
  .video-description h3 ,.video-description p{
    font-size: 15px;
    font-weight: 600;
    text-align: center;
    padding: 25px;
  }
</style>

@section('main-section')
    <section class="section-bg mt-5 pb-1">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <p>Ghusal, Wazu aur Namaz Ka Tarika</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12 mb-4">
              <div class="video-container">
                <iframe width="250" height="159" src="https://www.youtube-nocookie.com/embed/jjyzYUew1dA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                
                <div class="video-description">
                  <h3>Ghusal Ka Sahi Tariqa </h3>
                </div>
              </div>              
          </div>
          <div class="col-md-4 col-sm-12 mb-4">
              <div class="video-container">
                <iframe width="250" height="159" src="https://www.youtube.com/embed/7Z0TrcKVvCA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                
                <div class="video-description">
                  <h3>Wazu Ka Sahi Trika</h3>
                </div>
              </div>              
          </div>
          <div class="col-md-4 col-sm-12 mb-4">
              <div class="video-container">
                <iframe width="250" height="159" src="https://www.youtube-nocookie.com/embed/v8wqDuJs9c4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                
                <div class="video-description">
                  <h3>Namaz Padhane Ka Sahi Tarika</h3>
                </div>
              </div>              
          </div>
      </div>
      </div>
    </section>  
    <section  class="section-bg mt-1 pt-1">
      <div class="container ">
        <div class="section-title">
          <p>Namazo Ki Rakate</p>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 table-responsive">               
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        {{-- <tr>
                            <th></th>
                            <th colspan="2" class="header-green">Muakkadah</th>
                            <th class="header-green"></th>
                            <th colspan="2" class="header-yellow">Waajib</th>
                            <th class="header-total"> </th>
                            <th class="header-total" rowspan="2"> Total Rakats</th>
                        </tr> --}}
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sunnat</th>
                            <th scope="col">Farz</th>
                            <th scope="col">Sunnat</th>
                            <th scope="col">Nafl</th>
                            <th scope="col">Witr</th>
                            <th scope="col">Nafl</th>
                            <th scope="col">Total Rakats</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Fajr</th>
                            <td class="muakkadah">2</td>
                            <td>2</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <th>4</th>
                        </tr>
                        <tr>
                            <th scope="row">Zohr</th>
                            <td class="muakkadah">4</td>
                            <td>4</td>
                            <td class="muakkadah">2</td>
                            <td>2</td>
                            <td>-</td>
                            <td>-</td>
                            <th>12</th>
                        </tr>
                        <tr>
                            <th scope="row">Asr</th>
                            <td class="muakkadah">4</td>
                            <td>4</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <th>8</th>
                        </tr>
                        <tr>
                            <th scope="row">Maghrib</th>
                            <td>-</td>
                            <td>3</td>
                            <td class="muakkadah">2</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <th>7</th>
                        </tr>
                        <tr>
                            <th scope="row">Isha</th>
                            <td class="muakkadah">4</td>
                            <td>4</td>
                            <td class="muakkadah">2</td>
                            <td>2</td>
                            <td class="waajib">3</td>
                            <td>2</td>
                            <th>17</th>
                        </tr>
                        <tr>
                            <th scope="row">Jumuah</th>
                            <td class="muakkadah">4</td>
                            <td>2</td>
                            <td class="muakkadah">4+2</td>
                            <td>2</td>
                            <td>-</td>
                            <td>-</td>
                            <th>14</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>  
  @endsection 
  

  