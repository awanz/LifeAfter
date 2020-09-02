<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
        <a href="{{ base_url('dashboard') }}" class="site_title"><i class="fa fa-cloud"></i> <span>LifeAfter</span></a>
      </div>

      <div class="clearfix"></div>

      <!-- menu profile quick info -->
      <div class="profile clearfix">
        <div class="profile_pic">
          <img src="{{ base_url('assets/gentelella/images/img.jpg') }}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
          <span>Welcome,</span>
          <h2>{{ $userdata['username'] }}</h2>
        </div>
      </div>
      <!-- /menu profile quick info -->

      <br />

      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ base_url('dashboard') }}">Dashboard</a></li>
              </ul>
            </li>
            <li><a><i class="fa fa-edit"></i> Items <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ base_url('item_category') }}">Item Categories</a></li>
                <li><a href="{{ base_url('items') }}">Items</a></li>
                <li><a href="{{ base_url('item_prices') }}">Item Prices</a></li>
              </ul>
            </li>
            
            <ul class="nav side-menu">
              <li><a href="{{ base_url('wiki') }}"><i class="fa fa-laptop"></i> Wiki</a></li>
            </ul>
            <ul class="nav side-menu">
              <li><a href="{{ base_url('recipes') }}"><i class="fa fa-laptop"></i>Recipes</a></li>
            </ul>
            <li><a><i class="fa fa-edit"></i> General <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ base_url('maps') }}">Maps</a></li>
                <li><a href="{{ base_url('servers') }}">Servers</a></li>
              </ul>
            </li>
          </ul>
        </div>

      </div>
      <!-- /sidebar menu -->

      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings" href="{{ base_url('settings') }}">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Contributor" href="{{ base_url('contributor') }}">
          <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ base_url('logout') }}">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
      </div>
      <!-- /menu footer buttons -->
    </div>
</div>