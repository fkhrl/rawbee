@extends('site.layout.master')
@section('title','Product')
@section('breadcrumbs')
    @include('site.include.breadcrumbs')
@endsection
@section("className","page-content-wrap")
@section('content')
<div class="container">
  <main id="main" class="col-md-9">
     <div class="content-element" style="margin-bottom: 40px;">
        <h2>Our Products in "{{$SubCategory[0]->category_name}}" category</h2>
        <!-- - - - - - - - - - - - - - Icon Box - - - - - - - - - - - - - - - - -->
        <div class="icons-box fx-cols-4">
           @if ($SubCategory)
           @if (count($SubCategory)>0)
               @foreach ($SubCategory as $item)
               <?php 
                     $names = strtolower(str_replace(' ','-',$item->name));
                     $catName = str_replace('/','-',$names);
               ?>
                   <!-- - - - - - - - - - - - - - Icon Box Item - - - - - - - - - - - - - - - - -->
                     <div class="icons-wrap">
                        <a href="{{url('products/'.$item->category.'/subcategory/'.$item->id.'/'.$catName)}}" class="icons-item type-2">
                           <img src="{{url('upload/subcategory/'.$item->image)}}" alt="{{$item->name}}">
                           <div class="item-box">
                              {{-- <i class="licon-road"></i> --}}
                              <h5 class="icons-box-title">{{$item->name}}</h5>
                           </div>
                        </a>
                     </div>
               @endforeach
           @endif
               
           @endif
           
           
        </div>
     </div>
  </main>
  <!-- Sidebar-->
  <aside id="sidebar" class="col-md-3">
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
  </aside>
</div>
</div>
@endsection