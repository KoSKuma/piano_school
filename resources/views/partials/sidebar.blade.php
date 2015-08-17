<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
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
                    <span>Add User</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('teacher')}}">Teacher</a></li>
                    <li><a href="{{url('student')}}">Student</a></li>
                </ul>
            </li>
                 <li class="treeview">
                <a href="#">
                    <i class='fa   fa-user'></i> 
                    <span>User Profile</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('teacher/add')}}">Teacher</a></li>
                    <li><a href="{{url('student/add')}}">Student</a></li>
                </ul>
            </li>
             <li >
                <a href="{{url('courses/add')}}">
                    <i class='fa fa-calendar'></i> 
                    <span>Calendar</span>
                </a>
            </li>
              <li >
                <a href="{{url('schedule')}}">
                    <i class='fa fa-calendar-o'></i> 
                    <span>Schedule</span>
                </a>
            </li>
            
           
            
             
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
