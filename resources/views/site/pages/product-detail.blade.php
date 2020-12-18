@extends('site.layout.master')
@section('title','Product')
@section('breadcrumbs')
    @include('site.include.breadcrumbs')
@endsection
@section("className","with-separator-right sbr")
@section('content')
<div class="container">
        
    <div class="row">
    
      <!-- Main content -->
      <main id="main" class="col-md-9">
        
        <!-- page-section -->
        <div class="page-section">
          
          <div class="content-element-type-2">
            @if (isset($OurProduct))
            <article class="service-thumbnail">

              <h4>{{$OurProduct->name}}</h4>
              @if (isset($$OurProduct->image))
                  
              <div class="service-img"><img src="{{url('upload/ourproduct/'.$OurProduct->image)}}" alt="{{$OurProduct->name}}"></div>
              @endif

              <p class="text-size-medium"> {!! $OurProduct->details !!}</p>

            </article>
            @else
                <code>Product details not found!</code>
            @endif
            

          </div>

          

        </div>

      </main>
      
      <!-- Sidebar-->
      <aside id="sidebar" class="col-md-3">
        
        <!-- page-section -->
        <div class="page-section">
          
          <!-- widget -->
          <div class="widget">

            <h5 class="widget-title">Category</h5>
            <ul class="info-links">
              @if(isset($cat))
              @foreach($cat as $ca)
              <?php 
                  $names = strtolower(str_replace(' ','-',$ca['name']));
                  $catName = str_replace('/','-',$names);
              ?>
                <li><a href="{{url('/product-category/'.$ca['id'].'/'.$catName)}}">{{$ca['name']}}</a></li>
                @endforeach
                 @endif
                 
             </ul>
            
          </div>

        
        </div>

      </aside>

    </div>

  </div>
@endsection