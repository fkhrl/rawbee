@extends('site.layout.master')
@section('title','Our Service')
@section('breadcrumbs')
    @include('site.include.breadcrumbs')
@endsection
@section('content')
<div class="container">
        
  <div class="row">
    <div class="service">
      @if ($OurService)
          @if (count($OurService)>0)
              @foreach ($OurService as $item)
                <div class="col-md-12 mt_10" id="{{$item->title}}">
                  <div class="col-sm-6">
                    <h2 class="center">{{$item->title}}</h2>
                    <span class="separator"></span>
                    <p style="text-align: justify !important">{!! $item->detail !!}</p> 
                  </div>
                  <div class="col-sm-5">
                    <div class="banners-wrap fx-cols-2" style="padding-top: 22%;">
                        <img src="{{url('upload/ourservice/'.$item->image)}}" alt="{{$item->title}}">
                      </div>
                  </div> 
                </div>
              @endforeach
          @endif
      @endif
      
      
    </div> 
  </div>

</div>
@endsection