
@extends("admin.layout.master")
@section("title","Edit Site Setting")
@section("content")
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Site Setting</h1>
      </div>
      <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Update Site Setting</li>
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
            <h3 class="card-title">Edit / Modify Site Setting</h3>
        </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('sitesetting/update/'.$dataRow->id)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="site_name">Site Name</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->site_name)){
                            ?>
                            value="{{$dataRow->site_name}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Site Name" id="site_name" name="site_name">
                      </div>
                    </div>
                </div>
                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Site Logo</label>
                                    <!-- <label for="customFile">Upload Site Logo</label> -->
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input"  id="main_logo" name="main_logo">
                                      <input type="hidden" value="{{$dataRow->main_logo}}" name="ex_main_logo" />
                                      <label class="custom-file-label" for="customFile">Upload Site Logo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(isset($dataRow->main_logo))
                                    @if(!empty($dataRow->main_logo))
                                        <img class="img-thumbnail" src="{{url('upload/sitesetting/'.$dataRow->main_logo)}}" width="150">
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upload Bottom Logo</label>
                                    <!-- <label for="customFile">Upload Bottom Logo</label> -->
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input"  id="bottom_logo" name="bottom_logo">
                                      <input type="hidden" value="{{$dataRow->bottom_logo}}" name="ex_bottom_logo" />
                                      <label class="custom-file-label" for="customFile">Upload Bottom Logo</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(isset($dataRow->bottom_logo))
                                    @if(!empty($dataRow->bottom_logo))
                                        <img class="img-thumbnail" src="{{url('upload/sitesetting/'.$dataRow->bottom_logo)}}" width="150">
                                    @endif
                                @endif
                            </div>
                        </div>
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="mobile_number">Mobile Number</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->mobile_number)){
                            ?>
                            value="{{$dataRow->mobile_number}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Mobile Number" id="mobile_number" name="mobile_number">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->email)){
                            ?>
                            value="{{$dataRow->email}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Email Address" id="email" name="email">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" rows="3"  placeholder="Enter Address" id="address" name="address"><?php 
                                if(isset($dataRow->address)){
                                    
                                    echo $dataRow->address;
                                    
                                }
                                ?></textarea>
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->facebook)){
                            ?>
                            value="{{$dataRow->facebook}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Facebook Link" id="facebook" name="facebook">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->twitter)){
                            ?>
                            value="{{$dataRow->twitter}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Twitter Link" id="twitter" name="twitter">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="google_plus">Google Plus</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->google_plus)){
                            ?>
                            value="{{$dataRow->google_plus}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Google Plus Link" id="google_plus" name="google_plus">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->linkedin)){
                            ?>
                            value="{{$dataRow->linkedin}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter LinkedIn Link" id="linkedin" name="linkedin">
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
              <a class="btn btn-danger" href="{{url('sitesetting/edit/'.$dataRow->id)}}">
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