
@extends("admin.layout.master")
@section("title","Edit About Us")
@section("content")
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>About Us</h1>
      </div>
      <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Update About Us</li>
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
            <h3 class="card-title">Edit / Modify About Us</h3>
        </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('aboutus/update/'.$dataRow->id)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->title)){
                            ?>
                            value="{{$dataRow->title}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Title" id="title" name="title">
                      </div>
                    </div>
                </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <!-- <label for="customFile">Upload Image</label> -->
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input"  id="image" name="image">
                                      <input type="hidden" value="{{$dataRow->image}}" name="ex_image" />
                                      <label class="custom-file-label" for="customFile">Upload Image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(isset($dataRow->image))
                                    @if(!empty($dataRow->image))
                                        <img class="img-thumbnail" src="{{url('upload/aboutus/'.$dataRow->image)}}" width="150">
                                    @endif
                                @endif
                            </div>
                        </div>
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" rows="3"  placeholder="Enter Details" id="details" name="details"><?php 
                                if(isset($dataRow->details)){
                                    
                                    echo $dataRow->details;
                                    
                                }
                                ?></textarea>
                      </div>
                    </div>
                </div>
                       
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> 
                Update
              </button>
              <a class="btn btn-danger" href="{{url('aboutus/edit/'.$dataRow->id)}}">
                <i class="far fa-times-circle"></i> 
                Reset
              </a>
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
@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('admin/plugins/summernote/summernote-bs4.css')}}">
@endsection
@section("js")

    <script src="{{url('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{url('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        bsCustomFileInput.init();
        $('textarea').summernote()
    });
    </script>

@endsection