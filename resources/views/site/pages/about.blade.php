@extends('site.layout.master')
@section('title','About Us')
@section('breadcrumbs')
    @include('site.include.breadcrumbs')
@endsection
@section('content')
    <!-- page-section -->
    <div class="page-section">
        
        <!-- Banners section -->
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <h2 class="section-title">{{$AboutUs->title}}</h2>
              
              <!-- Medium text size -->
              <p class="text-size-medium" style="text-align: justify">{!! $AboutUs->details !!}</p>
            </div>
          </div>
        </div>

      </div>
      <!--/ page-section -->
@endsection