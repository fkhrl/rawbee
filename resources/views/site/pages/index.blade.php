@extends('site.layout.master')
@section('title','Home')
@section('slider')
    @include('site.include.slider')
@endsection
@section('content')
    <!-- page-section -->
    <div class="page-section">
        
        <!-- Banners section -->
        <div class="container">
          <div class="row">
            <div class="col-md-6">

              <h2 class="section-title">{{$AboutUs->title}}</h2>
              
              <!-- Medium text size -->
              <p class="text-size-medium" style="text-align: justify"> {!! html_entity_decode($AboutUs->details, ENT_QUOTES, 'UTF-8') !!} </p>

              <a href="{{url('/about')}}" class="info-btn">More about us</a>

            </div>
            <div class="col-md-6">
              
              <div class="banners-wrap fx-cols-2" style="padding-top: 19%;">
                
                <img src="{{url('upload/aboutus/'.$AboutUs->image)}}" alt="{{$AboutUs->title}}">

              </div>

            </div>
          </div>
        </div>

    </div>
      <!--/ page-section -->

      <!-- page-section -->
      <div class="page-section-bg">
        
        <!-- Icons section -->
        <div class="container">
          
          <div class="content-element-type-2">
            
            <div class="row">
              <div class="col-md-4">

                <h6 class="section-pre-title">what we offer</h6>
                <h2 class="section-title">Our Services</h2>

              </div>
              <div class="col-md-8">
                
                <p>Sustainability is a constant effort in our legendary levels of service , Customer service for us is a journey we enjoy and not a destination.</p>

              </div>
            </div>

          </div>
          
          <div class="icons-box fx-cols-4">
             @if (isset($OurService))
                <?php $i=1;?>
                 @if (count($OurService)>0)
                  @foreach ($OurService as $row)
                    <?php
                    if ($i==1) {
                      $iconClass='licon-stamp';
                    } 
                    elseif ($i==2) {
                      $iconClass='licon-3d-rotate';
                    } 
                    elseif ($i==3) {
                      $iconClass='licon-map';
                    }
                    else {
                      $iconClass='licon-3d-rotate';
                    }
                    
                    ?>
                      <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                        <div class="icons-wrap">

                          <div class="icons-item">
                            <div class="item-box">
                              <i class="<?= $iconClass?>"></i>
                              <h5 class="icons-box-title">{{$row->title}}</h5>
                              <p>{!! str_limit(strip_tags($row->detail), $limit = 70, $end = '..') !!}</p>
                              <a href="service#{{$row->title}}" class="info-btn">Read More</a>
                            </div>
                          </div>

                        </div>
                        <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                        <?php $i++?>
                  @endforeach
                     
                 @endif
             @endif 
            
      
    
          </div>

        </div>

      </div>
      <!--/ page-section -->


      <!-- page-section -->
      <div id="get_quote" class="page-section">
        
        <!-- Quotes section -->
        <div class="container">

          <div class="row">
            <div class="col-md-6">
              
              <h6 class="section-pre-title">questions & answers</h6>
              <h2 class="section-title">Frequently Asked Questions</h2>

              <div class="accordion">
                @if (isset($Faq))
                    @foreach ($Faq as $row)
                        <!--accordion item-->
                        <div class="accordion-item">
                          <h6 class="a-title">
                            {{$row->name}}
                          </h6>
                          <div class="a-content">
                            <p>
                              {!! $row->detail !!}
                            </p>
                          </div>
                        </div>
                    @endforeach
                @endif
                

                

              </div>

            </div>
            <div class="col-md-6">
              
              <h6 class="section-pre-title">Get a quotation</h6>
              <h2 class="section-title">Request a Free Quote!</h2>
              @if (\Session::has('status'))
                  <div class="alert alert-success">
                      <ul>
                          <li>{!! \Session::get('status') !!}</li>
                      </ul>
                  </div>
              @endif
              <form class="form-style1 fx-cols-2" method="POST" action="/quote/request">
                {{ csrf_field() }}
                <div class="form-column">
                  <input type="text" placeholder="Your Name" name="name" required>
                </div>
                <div class="form-column">
                  <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="form-column">
                  <input type="text" placeholder="Mobile Number" name="mobile_number" required>
                </div>
                <div class="form-column">
                  <input type="text" placeholder="Organization Name" name="organization_name" required>
                </div>
                
                <div class="form-column-full">
                  <textarea rows="4" placeholder="Message" name="message"></textarea>
                </div>
                <div class="form-column-full">
                  <input type="submit" class="btn" value="Submit Your Quote">
                </div>

              </form>

            </div>
          </div>

        </div>

      </div>
      <!--/ page-section -->
      <!-- page-section -->
      <div class="page-section-bg">
        
        <!-- Brend section -->
        <div class="container">

          <!-- - - - - - - - - - - - - Owl-Carousel - - - - - - - - - - - - - - - -->

          <div class="carousel-type-2">
            
            <div class="owl-carousel brend-box" data-max-items="6" data-item-margin="30" data-autoplay="true">
              @if (isset($Client))
                  @if (count($Client)>0)
                      @foreach ($Client as $item)
                          <!-- Slide -->
                          <div class="item-carousel">
                            <!-- Carousel Item -->
                            <a href="#" title="{{$item->name}}"><img title="{{$item->name}}" src="{{url('upload/client/'.$item->image)}}" alt="{{$item->name}}"></a>
                            <!-- /Carousel Item -->
                          </div>
                          <!-- /Slide -->
                      @endforeach
                  @endif
              @endif            
              

              
              
            </div>

          </div>

        </div>

      </div>
      <!--/ page-section -->
@endsection
@section('js')
<script src="{{url('theme/rawbee')}}/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{url('theme/rawbee')}}/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
@endsection