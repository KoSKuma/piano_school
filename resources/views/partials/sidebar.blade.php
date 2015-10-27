<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if(empty(Auth::user()->picture))
                    <img src="{{asset('uploads/profile_pictures/default.jpg')}}" class="img-circle" alt="User Image" />
                @else
                    <img src="{{asset('uploads/profile_pictures/'.Auth::user()->picture)}}" class="img-circle" alt="User Image" />
                @endif
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->firstname.' '.Auth::user()->lastname}}</p>
                <p>{{Auth::user()->roles->first()->display_name}}</p>

                <!-- Status -->
               <!--  <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>

        <!-- search form (Optional) -->
    <!--     <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- <li class="header">HEADER</li> -->
            <!-- Optionally, you can add icons to the links -->
           <!--  <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>Home</span></a></li>
            <li>
                <a href="{{url('room/show')}}">
                    <i class='fa fa-bank'></i> 
                    <span>ClassRoom</span>
                </a>
            </li> -->
            <li class="treeview">
                <a href="#">
                    <i class='fa  fa-user-plus'></i> 
                    <span>User</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if (Entrust::can('view-teacher'))
                    <li><a href="{{url('teacher')}}">Teacher</a></li>
                    @endif
                    @if (Entrust::can('view-student'))
                    <li><a href="{{url('student')}}">Student</a></li>
                    @endif
                </ul>
            </li>

           <!--  <li >
                <a href="{{url('calendar')}}">
                    <i class='fa fa-calendar'></i> 
                    <span>Calendar</span>
                </a>
            </li> -->
         <!--    <li >
                <a href="{{url('schedule')}}">
                    <i class='fa fa-calendar-o'></i> 
                    <span>Confirm Class</span>
                </a>
            </li> -->
            @if (Entrust::can(['view-payment']))
         <!--    <li>
                <a href="{{url('payment')}}">
                    <i class="fa fa-credit-card"></i>
                    <span>Topup</span>
                </a>
            </li> -->
            @endif

            @if (Entrust::can(['delete-student']))
            <li class="treeview">
                <a href="#">
                    <i class='fa  fa-trash-o'></i> 
                    <span>Manage Deleted</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    @if (Entrust::can('delete-teacher'))
                    <li><a href="{{url('teacher/deleted')}}">Teacher</a></li>
                    @endif
                    @if (Entrust::can('delete-student'))
                    <li><a href="{{url('student/deleted')}}">Student</a></li>
                    @endif
                </ul>
            </li>
            @endif

             <li >
                <a href="{{url('teacherschedule')}}">
                    <i class='fa fa-calendar-o'></i> 
                    <span>Teacher Schedule</span>
                </a>
            </li>


           
            
             
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
