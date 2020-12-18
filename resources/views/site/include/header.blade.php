    <!-- - - - - - - - - - - - - Mobile Menu - - - - - - - - - - - - - - -->

    <nav id="mobile-advanced" class="mobile-advanced"></nav>

    <!-- - - - - - - - - - - - - - Header - - - - - - - - - - - - - - - - -->

    <header id="header">

      <!--search form-->
      <div class="searchform-wrap">
        <div class="vc-child h-inherit">

          <form>
            <input type="text" name="search" placeholder="Start typing...">
            <button type="button"></button>
          </form>

        </div>
      </div>
      
      <!-- top-bar -->

      <div class="top-bar">
        
        <div class="container">
          
          <div class="table-row">
            
            <div class="col-sm-6">
              
              <ul class="contact-info">
                <li>Phone: <a href="tel::{{$SiteSetting->mobile_number}}" tel="{{$SiteSetting->mobile_number}}">{{$SiteSetting->mobile_number}}</a></li>
                <li>Email: <a href="mailto::{{$SiteSetting->email}}">{{$SiteSetting->email}}</a></li>
              </ul>

            </div>
            <div class="col-sm-6">
            
              <ul class="social-icons">

                  <li><a href="{{$SiteSetting->facebook}}"><i class="icon-facebook"></i></a></li>
                  <li><a href="{{$SiteSetting->google_plus}}"><i class="icon-gplus"></i></a></li>
                  <li><a href="{{$SiteSetting->twitter}}"><i class="icon-twitter"></i></a></li>
                  <li><a href="{{$SiteSetting->linkedin}}"><i class="icon-linkedin-1"></i></a></li>
                  <li><a href="mailto::{{$SiteSetting->email}}"><i class="icon-mail"></i></a></li>

                </ul>
            </div>
  
          </div>

        </div>

      </div>

      <!-- top-header -->

      <div class="top-header">

        <div class="container">

          <div class="table-row">
            
            <div class="col-md-3">

              <!--Logo-->
              
              <a href="{{url('/index')}}" class="logo">
          
                <img src="{{url('upload/sitesetting/'.$SiteSetting->main_logo)}}" alt="{{$SiteSetting->site_name}}">

              </a>

            </div>
            <div class="col-md-9">
              
              <!-- - - - - - - - - - - - / Mobile Menu - - - - - - - - - - - - - -->

              <!--main menu-->

              <div class="menu-holder">
                
                <div class="menu-wrap">

                  <div class="nav-item">
                    
                    <!-- - - - - - - - - - - - - - Navigation - - - - - - - - - - - - - - - - -->
                    <nav id="main-navigation" class="main-navigation">
                      <ul id="menu" class="clearfix">
                        <li class="{{ Request::path() == 'index' ? 'current' : '' }} "><a href="{{url('/index')}}">Home</a></li>
                        <li class="{{ Request::path() == 'about' ? 'current' : '' }} "><a href="{{url('/about')}}">About us</a></li>
                        <li class="{{ Request::path() == 'service' ? 'current' : '' }} "><a href="{{url('/service')}}">Services</a></li>
                        
                        <li class="dropdown"><a href="#">Our Product</a>
                          <!--sub menu-->
                          <div class="sub-menu-wrap">
                            <ul>
                              @if(isset($cat))
                              @foreach($cat as $ca)
                              <?php 
                                  $names = strtolower(str_replace(' ','-',$ca['name']));
                                  $catName = str_replace('/','-',$names);
                              ?>
                              <li class="sub"><a href="{{url('/product-category/'.$ca['id'].'/'.$catName)}}">{{$ca['name']}}</a>
                                @if(!empty($ca['scat']))
                                <!--sub menu-->
                                <div class="sub-menu-wrap sub-menu-inner">
                                  <ul>
                                    @foreach($ca['scat'] as $sca)
                                    <?php 
                                        $names = strtolower(str_replace(' ','-',$sca['name']));
                                        $subcatName = str_replace('/','-',$names);
                                    ?>
                                    <li><a href="{{url('products/'.$ca['id'].'/subcategory/'.$sca['id'].'/'.$subcatName)}}">{{$sca['name']}}</a></li>
                                    @endforeach
                                  </ul>
                                </div>
                                @endif
                              </li>
                              @endforeach
                              @endif
                            </ul>
                          </div>
                        </li>
                        <li class="{{ Request::path() == 'contact' ? 'current' : '' }}"><a href="{{url('contact')}}">Contact us</a></li>
                      </ul>
                    </nav>

                    <!-- - - - - - - - - - - - - end Navigation - - - - - - - - - - - - - - - -->

                    <div class="search-holder">

                      <button class="search-button"></button>

                    </div>

                  </div>

                </div>

              </div>

            </div>
  
          </div>
          
        </div>

      </div>

    </header>

    <!-- - - - - - - - - - - - - end Header - - - - - - - - - - - - - - - -->
