<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar custome-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu fanlyfe-menu">
             {{-- Dashboaard--}}
        @if(Auth::user()->hasRole('admin'))
            <li class="treeview">
                <a href="{{ url('admin/') }}"><i class="fa fa-home font-color" aria-hidden="true"></i><span>Dashboard</span></a>
            </li>

            <li class="treeview">
                <a href="{{ url('admin/users_lists/') }}"><i class="fa fa-home font-color" aria-hidden="true"></i><span>Users</span></a>
            </li>
           
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Uploads</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="{{ url('admin/upload-image') }}"><i class="fa fa-cart-plus font-color" aria-hidden="true"></i><span>  Pictures </span></a>
                    </li>

                    <li class="treeview">
                        <a href="{{ url('admin/upload-video') }}"><i class="fa fa-cart-plus font-color" aria-hidden="true"></i><span>  Video </span></a>
                    </li>

                    <li class="treeview">
                        <a href="{{ url('admin/avatar') }}"><i class="fa fa-cart-plus font-color" aria-hidden="true"></i><span>  Upload Avatar </span></a>
                    </li>

                    <li class="treeview">
                        <a href="{{ url('admin/upload-video-package-event') }}"><i class="fa fa-cart-plus font-color" aria-hidden="true"></i><span>  Video Package / Event </span></a>
                    </li>
                </ul>
            </li>
           

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Questionnaire</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('admin/questions')}}"><i class="fa fa-circle-o"></i>Register</a></li>
                        <li><a href="{{url('admin/hiring-questions')}}"><i class="fa fa-circle-o"></i> Hiring</a></li>
                    </ul>
                </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/reports/package-booking')}}"><i class="fa fa-circle-o"></i>Package Booking</a></li>
                    <li><a href="{{url('admin/reports/event-booking')}}"><i class="fa fa-circle-o"></i> Event Booking</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/setting/terms-condition')}}"><i class="fa fa-circle-o"></i>Terms and Conditions</a></li>
                    <li><a href="{{url('admin/setting/admin-email')}}"><i class="fa fa-circle-o"></i>Configure Email</a></li>
                    <li><a href="{{url('admin/setting/cancum-extra')}}"><i class="fa fa-circle-o"></i>Cancun Extras</a></li>
                    <li><a href="{{url('admin/setting/talent')}}"><i class="fa fa-circle-o"></i>Talent</a></li>

                </ul>
            </li>
        @elseif(Auth::user()->hasRole('sales_admin'))
                <li class="treeview">
                    <a href="{{ url('sales_admin/') }}"><i class="fa fa-home font-color" aria-hidden="true"></i><span>Dashboard</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('sales_admin/packages') }}"><i class="fa fa-home font-color" aria-hidden="true"></i><span>Packages</span></a>
                </li>
                <li class="treeview">
                    <a href="{{ url('sales_admin/reports/package-booking') }}">
                        <i class="fa fa-pie-chart font-color" aria-hidden="true"></i>
                        <span>Packages Reports</span>
                    </a>
                </li>
        @endif

            {{-- Reports--}}
            <li class="treeview">
                <a href="{{ url('logout')  }}"><i class="fa fa-sign-out font-color" aria-hidden="true"></i><span>Logout</span></a>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
