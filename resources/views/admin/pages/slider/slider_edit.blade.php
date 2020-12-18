
@extends("admin.layout.master")
@section("title","Edit Slider")
@section("content")
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Slider</h1>
      </div>
      <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('slider/list')}}">Datatable </a></li>
              <li class="breadcrumb-item"><a href="{{url('slider/create')}}">Create New </a></li>
              <li class="breadcrumb-item active">Edit / Modify</li>
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
            <h3 class="card-title">Edit / Modify Slider</h3>
            <div class="card-tools">
              <ul class="pagination pagination-sm float-right">
                <li class="page-item">
                    <a class="page-link bg-primary" href="{{url('slider/create')}}"> 
                        Create 
                        <i class="fas fa-plus"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link bg-primary" href="{{url('slider/list')}}"> 
                        Data 
                        <i class="fas fa-table"></i>
                    </a>
                </li>
                <li class="page-item">
                  <a class="page-link  bg-primary" target="_blank" href="{{url('slider/export/pdf')}}">
                    <i class="fas fa-file-pdf" data-toggle="tooltip" data-html="true"title="Pdf"></i>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link  bg-primary" target="_blank" href="{{url('slider/export/excel')}}">
                    <i class="fas fa-file-excel" data-toggle="tooltip" data-html="true"title="Excel"></i>
                  </a>
                </li>
              </ul>
            </div>
        </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('slider/update/'.$dataRow->id)}}" method="post" enctype="multipart/form-data">
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
                        
                        class="form-control" placeholder="Enter Slider Title" id="title" name="title">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="sub_title">Sub Title</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->sub_title)){
                            ?>
                            value="{{$dataRow->sub_title}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Slider Sub Title" id="sub_title" name="sub_title">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="short_detail">Short Detail</label>
                        <textarea class="form-control" rows="3"  placeholder="Enter Short Detail" id="short_detail" name="short_detail"><?php 
                                if(isset($dataRow->short_detail)){
                                    
                                    echo $dataRow->short_detail;
                                    
                                }
                                ?></textarea>
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
                                        <img class="img-thumbnail" src="{{url('upload/slider/'.$dataRow->image)}}" width="150">
                                    @endif
                                @endif
                            </div>
                        </div>
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="button_title">Button Title</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->button_title)){
                            ?>
                            value="{{$dataRow->button_title}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Button Title" id="button_title" name="button_title">
                      </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" 
                            
                        <?php 
                        if(isset($dataRow->link)){
                            ?>
                            value="{{$dataRow->link}}" 
                            <?php 
                        }
                        ?>
                        
                        class="form-control" placeholder="Enter Link" id="link" name="link">
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label>Position</label>
                        <select class="form-control select2" style="width: 100%;"  id="position" name="position">
                          
                        <option value="">Please select</option>
                          <option 
                          <?php 
                          if($dataRow->status=="Left"){
                              ?>
                              selected="selected" 
                              <?php 
                          }
                          ?> 
                          value="Left">Left</option>
                          <option 
                          <?php 
                          if($dataRow->status=="Right"){
                              ?>
                              selected="selected" 
                              <?php 
                          }
                          ?> 
                          value="Right">Right</option>
                        </select>
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
              <a class="btn btn-danger" href="{{url('slider/edit/'.$dataRow->id)}}">
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
@section("js")

    <script src="{{url('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        bsCustomFileInput.init();
    });
    </script>

@endsection
        