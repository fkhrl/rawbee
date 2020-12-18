    <!-- - - - - - - - - - - - - - Revolution Slider - - - - - - - - - - - - - - - - -->

    <div class="rev-slider-wrapper">

        <div id="rev-slider" class="rev-slider"  data-version="5.0">
  
          <ul>
  
            
            @if (isset($Slider))
                @if (count($Slider)>0)
                  @foreach ($Slider as $row)
                  <?php
                    if($row->position=="Left"){
                      $liClassName ='align-left';
                      $dataXLeft ='left';
                      $dataHoffset = '100';
                      $dataVoffset = '160';
                      $dataVoffset2 = '230';

                      
                    }else {
                      $liClassName ='align-right';
                      $dataXLeft ='right';
                      $dataHoffset = '0';
                      $dataVoffset = '160';
                      $dataVoffset2 = '230';

                      
                    }
                  ?>
                  <li data-transition="fade" class="<?= $liClassName ?>">
  
                    <img src="{{url('upload/slider/'.$row->image)}}" class="rev-slidebg" alt="{{$row->title}}"> 
                   
                    <!-- - - - - - - - - - - - - - Layer 1 - - - - - - - - - - - - - - - - -->
        
                    <div class="tp-caption tp-resizeme scaption-white-large2 rs-parallaxlevel-1"
                    data-x="<?= $dataXLeft?>" data-hoffset="<?= $dataHoffset?>"
                    data-y="top" data-voffset="<?= $dataVoffset?>"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":750,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                    data-responsive_offset="on" 
                    data-elementdelay="0.05" >{{$row->title}}</div>

                  <!-- - - - - - - - - - - - - - End of Layer 1 - - - - - - - - - - - - - - - - -->

                  <!-- - - - - - - - - - - - - - Layer 2 - - - - - - - - - - - - - - - - -->

                  <div class="tp-caption tp-resizeme scaption-white-small2 rs-parallaxlevel-2"
                    data-x="<?= $dataXLeft?>" data-hoffset="<?= $dataHoffset?>"
                    data-y="top" data-voffset="<?= $dataVoffset2?>"
                    data-frames='[{"delay":1200,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>{{$row->sub_title}}</div>

                  <!-- - - - - - - - - - - - - - End of Layer 2 - - - - - - - - - - - - - - - - -->

                  <!-- - - - - - - - - - - - - - Layer 3 - - - - - - - - - - - - - - - - -->

                  <div class="tp-caption tp-resizeme scaption-white-text rs-parallaxlevel-3"
                    data-x="<?= $dataXLeft?>" data-hoffset="<?= $dataHoffset?>"
                    data-y="top" data-voffset="280"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":1700,"speed":2000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":1000,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'>{!! $row->short_detail !!} </div>

                  <!-- - - - - - - - - - - - - - End of Layer 3 - - - - - - - - - - - - - - - - -->

                  <!-- - - - - - - - - - - - - - Layer 4 - - - - - - - - - - - - - - - - -->

                  <div class="tp-caption tp-resizeme scaption-white-text rs-parallaxlevel-4"
                    data-x="<?= $dataXLeft?>" data-hoffset="100"
                    data-y="top" data-voffset="370"
                    data-whitespace="nowrap"
                    data-frames='[{"delay":2200,"speed":2500,"frame":"0","from":"x:[100%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"frame":"999","to":"auto:auto;","ease":"Power2.easeInOut"},{"frame":"hover","speed":"300","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;"}]'><a href="{{$row->link}}" class="btn btn-big btn-style-5">{{$row->button_title}}</a></div>

                  <!-- - - - - - - - - - - - - - End of Layer 4 - - - - - - - - - - - - - - - - -->
        
                  </li>
                  @endforeach
                    
                @endif
            @endif
            
       
            
  
          </ul>
  
        </div>
  
      </div>
  
      <!-- - - - - - - - - - - - - - End of Slider - - - - - - - - - - - - - - - - -->
  