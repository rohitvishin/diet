<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}">Mansi Padechia</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"><i class="fas fa-notes-medical"></i></a>
        </div>
        <ul class="sidebar-menu text-center">
            <li><a class="nav-link text-left" href="{{route('home')}}"><i class="fas fa-home"></i>
                    <span>Dashboard</span></a></li>

            <li class="menu-header">Practice Management</li>
            <li><a class="nav-link text-left" href="{{ url('appointments') }}"><i
                        class="fas fa-file"></i><span>Appointments</span></a></li>
            <li class="active"><a class="nav-link  text-left" href="clients.php"><i class="fas fa-user"></i><span>My
                        Clients</span></a></li>
            <li><a class="nav-link  text-left" href="{{ url('packageMaster') }}"><i
                        class="fas fa-box"></i><span>Packages</span></a></li>

            <li class="menu-header">Resources Management</li>
            <li><a class="nav-link text-left" href="{{ url('medicalMaster') }}"><i class="fas fa-database"></i>
                    <span>Medical
                        Master</span></a></li>
            <li><a class="nav-link text-left" href="{{ url('labMaster') }}"><i class="fas fa-database"></i> <span>Lab
                        Master</span></a></li>
            <li><a class="nav-link text-left" href="{{ url('activityMaster') }}"><i class="fas fa-database"></i>
                    <span>Activity
                        Master</span></a></li>
            <li><a class="nav-link text-left" href="{{ url('foodMaster') }}"><i class="fas fa-database"></i> <span>Food
                        Master</span></a></li>
            <li><a class="nav-link text-left" href="{{ url('productMaster') }}"><i
                        class="fas fa-user-circle"></i><span>Product
                        Master</span></a></li>
            <li><a class="nav-link text-left" href="{{ url('dietTemplateMaster') }}"><i class="fas fa-file-code"></i>
                    <span>My
                        Templates</span></a></li>
            <li><a class="nav-link text-left" href="{{ url('profile') }}"><i class="fas fa-user-circle"></i><span>My
                        Profile</span></a></li>


            <li class="menu-header">Sales Management</li>
            <li><a class="nav-link text-left" href="layout-default.html"><i class="fas fa-comment"></i> <span>Send
                        Promotions</span></a></li>
            <li><a class="nav-link text-left" href="layout-default.html"><i class="fas fa-business-time"></i><span>Send
                        Reminders</span> </a></li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

                <a href="https://getstisla.com/docs" class="btn btn-primary btn-md btn-block btn-icon-split">
                    Logout
                </a>
            </div>
    </aside>
</div>