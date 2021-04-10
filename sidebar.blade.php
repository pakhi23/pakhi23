<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Blood Donation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img  src="{{auth()->user()->image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{url('profilee')}}" class="d-block">{{auth()->user()->name}}</a>
        </div>
      </div>

    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
       
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item menu-open">
            <a href="{{url('/home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right"></i>
              </p>
            </a>
            @can('location-tablee')
            <li class="nav-item menu-open">               
              <a href="#" class="nav-link">
                <i class="fas fa-map-marked-alt"></i>
                <p>
                Location
                  <i class="fas fa-angle-left right"></i>                 
                </p>
              </a>              
           
              <ul class="nav nav-treeview">   
             
                <li class="nav-item">
                  <a href="{{('tablecountry')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Country</p>
                  </a>
                </li> 
                
                         
           
                 <li class="nav-item">
                  <a href="{{('tablestate')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>State</p>
                  </a>
                  
                </li>

                <li class="nav-item">
                  <a href="{{('tablecity')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>City</p>
                  </a>
                </li>
               </ul> 
              
            </li>  
            @endcan 
            <li class="nav-item">
                            <a href="{{url('doner')}}" class="nav-link">
                              <i class="fas fa-users"></i></i>
                                <p> Doner</p>
                            </a>          
          </li>
          <li class="nav-item">
            <a href="{{url('finder')}}" class="nav-link">
              <i class="fas fa-users"></i></i>
                <p> Finder</p>
            </a> 
         
        
        </li>

                  <li class="nav-item">
                    <a href="{{ url('edit/'.auth()->user()->id) }}" class="nav-link">
                    <i class="fas fa-user-alt"></i></i>
                        <p>profile</p>
                    </a>         
        </li>
      

      </li>
      <li class="nav-item">
        <a href="{{url('subadmin')}}" class="nav-link">
        <i class="fas fa-user-alt"></i></i>
            <p>subadmin</p>
        </a>         
</li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>