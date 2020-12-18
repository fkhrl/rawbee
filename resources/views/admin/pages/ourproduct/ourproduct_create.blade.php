
@extends("admin.layout.master")
@section("title","Create New Our Product")
@section("content")
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Our Product</h1>
      </div>
      <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('ourproduct/list')}}">Our Product Data</a></li>
              <li class="breadcrumb-item active">Create New Our Product</li>
            </ol>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include("admin.include.msg")
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-8 offset-2">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create New Our Product</h3>
            <div class="card-tools">
              <ul class="pagination pagination-sm float-right">
                <li class="page-item"><a class="page-link bg-primary" href="{{url('ourproduct/list')}}"> Data <i class="fas fa-table"></i></a></li>
                <li class="page-item">
                  <a class="page-link  bg-primary" target="_blank" href="{{url('ourproduct/export/pdf')}}">
                    <i class="fas fa-file-pdf" data-toggle="tooltip" data-html="true"title="Pdf"></i>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link  bg-primary" target="_blank" href="{{url('ourproduct/export/excel')}}">
                    <i class="fas fa-file-excel" data-toggle="tooltip" data-html="true"title="Excel"></i>
                  </a>
                </li>
              </ul>
            </div>            
        </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('ourproduct')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          
            <div class="card-body">
                
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Select Category</label>
                                  <select class="form-control select2" style="width: 100%;"  id="category" name="category">
                                        <option value="">Please Select</option>
                                        @if(isset($dataRow_Category))    
                                            @if(count($dataRow_Category)>0)
                                                @foreach($dataRow_Category as $Category)
                                                    <option value="{{$Category->id}}">{{$Category->name}}</option>
                                                    
                                                @endforeach
                                            @endif
                                        @endif 
                                        
                                  </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row" id="subCat">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Select Sub Category</label>
                                  <select class="form-control select2" style="width: 100%;"  id="sub_category" name="sub_category">
                                        <option value="">Please Select</option>
                                        @if(isset($dataRow_SubCategory))    
                                            @if(count($dataRow_SubCategory)>0)
                                                @foreach($dataRow_SubCategory as $SubCategory)
                                                    <option value="{{$SubCategory->id}}">{{$SubCategory->name}}</option>
                                                    
                                                @endforeach
                                            @endif
                                        @endif 
                                        
                                  </select>
                                </div>
                            </div>
                        </div>
                    
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Product Name" id="name" name="name">
                      </div>
                    </div>
                </div>
                
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <!-- <label for="customFile">Upload Image</label> -->

                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input"  id="image" name="image">
                                      <label class="custom-file-label" for="customFile">Upload Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" rows="3"  placeholder="Enter Product Details" id="details" name="details"></textarea>
                      </div>
                    </div>
                </div>
                       
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
              <a class="btn btn-danger" href="{{url('ourproduct/create')}}"><i class="far fa-times-circle"></i> Reset</a>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection
@section("css")
    
    <link rel="stylesheet" href="{{url('admin/plugins/select2/css/select2.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('admin/plugins/summernote/summernote-bs4.css')}}">
    
@endsection
        
@section("js")

    <script src="{{url('admin/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        // $(".select2").select2();
    });
    </script>

    <script src="{{url('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script><!-- Summernote -->
    <script src="{{url('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        bsCustomFileInput.init();
        $('textarea').summernote();
    });
    </script>
    <script type="text/javascript">
      $("#subCat").hide();
      // ajax load data
      $("#category").click(function () {
          var div = $(this).val(); 
          if (div == null || div == 0)
          {
              var loadingscid = '<option value="0">Please Select Category</option>';
              $("#sub_category").html(loadingscid);
          } else
          {
              $("#subCat").show();
              var loadingscid = '<option value="0">Loading Please Wait...</option>';
              $("#sub_category").html(loadingscid);
              $.post("{{url('product/ajax/subCatData')}}", {'div': div, '_token': '<?php echo csrf_token(); ?>'}, function (divdata) {
                  //console.log(cdata);
                  var loadingscid = '<option value="0">Please Select Sub Category</option>';
                  $.each(divdata, function (index, val) {
                      //console.log(val);
                      loadingscid += '<option value="' + val.id + '">' + val.name + '</option>';
                  });
                  var getlength = divdata.length;
                  //console.log(getlength);
                  if (getlength == 0)
                  {
                      var loadingscid = '<option value="0">Please Select Another Category</option>';
                      $("#sub_category").html(loadingscid);
                      $("#subCat").hide();
                  } else
                  {
                      $("#sub_category").html(loadingscid);
                  }
              });
          }
      });
  </script>
@endsection
