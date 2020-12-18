

<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<![endif]-->
<head>

  <title>@yield('title') | RawBee</title>

  @include('site.include.headerCss')
  @yield('css')
  
</head>

<body class="wide-layout">

  <div class="loader"></div>
  

  <!--cookies-->
   <!-- <div class="cookies">
          <div class="container">
            <div class="clearfix">
              <span>Please note this website requires cookies in order to function correctly, they do not store any specific information about you personally.</span>
              <div class="f-right"><a href="#" class="btn btn-small btn-style-2">Accept Cookies</a><a href="#" class="btn btn-small btn-style-4">Read More</a></div>
            </div>
          </div>
        </div>  -->

  <!-- - - - - - - - - - - - - - Wrapper - - - - - - - - - - - - - - - - -->

  <div id="wrapper" class="wrapper-container">

    @include('site.include.header')
    @yield('slider')
    @yield('breadcrumbs')
    <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

    <div id="content" class="@yield('className')">
      @yield('content')
      

    </div>

    <!-- - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - -->

    <!-- - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->

    @include('site.include.footer')

    <!-- - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - -->

  </div>

  <!-- - - - - - - - - - - - end Wrapper - - - - - - - - - - - - - - -->

  @include('site.include.footerJs')
  @yield('js')
</body>
</html>