@extends('site.layout.master')
@section('title','Contact Us')
@section('breadcrumbs')
    @include('site.include.breadcrumbs')
@endsection
@section('content')
    <!-- page-section -->
    <div class="page-section-bg type2">
        
      <div class="container">
        
        <div class="row">
          <div class="col-md-8">
            
            <h2>Let's Talk about Your Business</h2>
            <p>Please fill out the form below and we will get back to you as soon as possible.</p>
            {{-- <form id="contact-form" class="contact-form form-style1 fx-cols-2"> --}}
              
              @if (\Session::has('status'))
                  <div class="alert alert-success">
                      <ul>
                          <li>{!! \Session::get('status') !!}</li>
                      </ul>
                  </div>
              @endif
              <form class="contact-form form-style1 fx-cols-2" method="POST" action="/quote/request">
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
                <button type="submit" class="btn" data-type="submit">Send Message</button>
              </div>

            </form>

          </div>
          <div class="col-md-4 ">
            
                <div class="contact-info-section">
                  <h2 class="fw-medium">Our Office</h2>
                  <p>{!! $SiteSetting->address !!}</p>
                  <span class="licon-telephone"></span> <a href="callto:{{$SiteSetting->mobile_number}}">{{$SiteSetting->mobile_number}}</a><br>
                  <span class="licon-at-sign"></span> <a href="mailto:{{$SiteSetting->email}}">{{$SiteSetting->email}}</a>
                </div>

          </div>
        </div>

      </div>

    </div>
    <!-- Google map -->
    <div class="relative">

      <div id="googleMap" class="map_container"></div>

    </div>
@endsection
@section('js')
    
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBN4XjYeIQbUspEkxCV2dhVPSoScBkIoic"></script>
@endsection