
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('sitesetting')}}" class="brand-link">
      <img src="{{ url('admin/dist/img/AdminLTELogo.png') }}"
           alt="Admin Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">rawbee Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item">
            <a href="{{url('crud')}}" class="nav-link {{ Request::path() == 'crud' ? 'active' : '' }}">
              <i class="nav-icon fas fa-igloo"></i>
              <p>CRUD</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{url('dashboard')}}" class="nav-link {{ Request::path() == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-igloo"></i>
              <p>Dashboard</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{url('bookingorder/create')}}" class="nav-link {{ Request::path() == 'bookingorder/create' ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Booking Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('order/search')}}" class="nav-link {{ Request::path() == 'order/search' ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Booking Order Report</p>
            </a>
          </li> --}}
          {{-- <li class="nav-item has-treeview {{ in_array(Request::path(),array('bookingrequest/create','bookingrequest','bookingconfiguration'))?'menu-open':'' }}">
            <a href="#" class="nav-link {{ in_array(Request::path(),array('bookingrequest/create','bookingrequest','bookingconfiguration'))?'active':'' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Booking
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('bookingconfiguration')}}" class="nav-link {{ Request::path() == 'bookingconfiguration' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking Configuration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('bookingrequest/create')}}" class="nav-link {{ Request::path() == 'bookingrequest/create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('bookingrequest')}}" class="nav-link {{ Request::path() == 'bookingrequest' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Booking List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('rentalbooking/create')}}" class="nav-link {{ Request::path() == 'rentalbooking/create' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Rental Booking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('rentalbooking')}}" class="nav-link {{ Request::path() == 'rentalbooking' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rental Booking List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('payment/log')}}" class="nav-link {{ Request::path() == 'payment/log' ? 'active' : '' }}">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>Payment log</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('slider')}}" class="nav-link {{ Request::path() == 'slider' ? 'active' : '' }}">
              <i class="nav-icon fas fa-igloo"></i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('dreamcontent')}}" class="nav-link {{ Request::path() == 'dreamcontent' ? 'active' : '' }}">
              <i class="nav-icon fas fa-igloo"></i>
              <p>Dream Content</p>
            </a>
          </li>
          
          
          
          
          <li class="nav-item has-treeview {{ in_array(Request::path(),array('exploreshelterinfo','shelterphoto'))?'menu-open':'' }}">
            <a href="#" class="nav-link {{ in_array(Request::path(),array('exploreshelterinfo','shelterphoto'))?'active':'' }}">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Explore The Shelter
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('exploreshelterinfo')}}" class="nav-link {{ Request::path() == 'exploreshelterinfo' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Explore Shelter Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('shelterphoto')}}" class="nav-link {{ Request::path() == 'shelterphoto' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shelter Photos</p>
                </a>
              </li>
            </ul>
          </li> --}}

          <li class="nav-item">
            <a href="{{url('aboutus')}}" class="nav-link {{ Request::path() == 'aboutus' ? 'active' : '' }}">
              <i class="nav-icon fas fa-igloo"></i>
              <p>About us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('slider')}}" class="nav-link {{ Request::path() == 'slider' ? 'active' : '' }}">
              <i class="nav-icon fas fa-igloo"></i>
              <p>Slider</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('ourservice')}}" class="nav-link {{ Request::path() == 'ourservice' ? 'active' : '' }}">
              <i class="nav-icon fas fa-igloo"></i>
              <p>Our Service</p>
            </a>
          </li>

          <li class="nav-item has-treeview {{ in_array(Request::path(),array('ourproduct','category','subcategory'))?'menu-open':'' }}">
            <a href="#" class="nav-link {{ in_array(Request::path(),array('ourproduct','category','subcategory'))?'active':'' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('ourproduct')}}" class="nav-link {{ Request::path() == 'ourproduct' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('category')}}" class="nav-link {{ Request::path() == 'category' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('subcategory')}}" class="nav-link {{ Request::path() == 'subcategory' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
              
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{url('contactus')}}" class="nav-link {{ Request::path() == 'contactus' ? 'active' : '' }}">
              <i class="nav-icon far fa-envelope"></i>
              <p>Contact Us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('sitesetting')}}" class="nav-link {{ Request::path() == 'sitesetting' ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Site Setting</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('faq')}}" class="nav-link {{ Request::path() == 'faq' ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Faq</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('client')}}" class="nav-link {{ Request::path() == 'client' ? 'active' : '' }}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Our Client</p>
            </a>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    {{-- ============================================ --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
    {{-- <div class="side-bar-bottom">
        <ul class="list-unstyled">
          <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Edit Profile"><a
              href="#"><i class="fas fa-cog"></i></a></li>
          <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Change Password"><a
              href="#"><i class="fas fa-key"></i></li>
          <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Lockscreen"><a
              href="#"><i class="fas fa-unlock"></i></a></li>
          <li class="list-inline-item" data-toggle="tooltip" data-html="true" title="Logout">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>
            </a>
           
          </li>
        </ul>
      </div> --}}
      <!-- End side-bar-bottom -->
  </aside>

  <style type="text/css">
    .side-bar-bottom {
      width: 100%;
      height: 35px;
      background-color: #343a40;
      position: -webkit-sticky;
      position: sticky;
      bottom: 0px;
      margin-top: 93%;
      color: #cccccc;
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      border-top: 2px solid #444a50;
      padding-top: 25px;
      /*-webkit-box-shadow: 0px 2px 5px 5px black;
      box-shadow: 0px 2px 5px 5px black;*/
  }
  .side-bar-bottom ul li a i{
    color: #fff;
    padding: 10px;
  }
  </style>