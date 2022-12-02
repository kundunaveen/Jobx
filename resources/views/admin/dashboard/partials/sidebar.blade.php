    <!--========= Aside Content End Here =========-->
    <aside class="dashboard-aside">
        <a href="javascript:void(0)" class="close">
            <span class="spriteicon"><i class="navbar-icon navbar-close"></i></span> 
        </a>
        <div class="aside-logo">
            <a href="{{ route('admin.dashboard') }}" class="logo-image d-inline-block  order-1 order-md-2  mb-3 mb-md-0">
                <img src="{{asset('assets/images/jobax-logo.png')}}" width="248" alt="" class="img-fluid" />
            </a>
        </div>
        <!-- Aside Nav Start Here -->
        <ul class="navbar nav d-block aside-menu">
            <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link {{ route('admin.dashboard') == url()->current() ? 'text-primary' : '' }}"><i class="navbar-icon icon-dasboard"></i>Dashboard</a></li>
            <li class="nav-item"><a href="{{ route('admin.manageEmployee') }}" class="nav-link {{ route('admin.manageEmployee') == url()->current() ? 'text-primary' : '' }}"><i class="navbar-icon icon-team"></i>Manage Employee</a></li>
            <li class="nav-item"><a href="{{ route('admin.manageEmployer') }}" class="nav-link {{ route('admin.manageEmployer') == url()->current() ? 'text-primary' : '' }}"><i class="navbar-icon icon-on-board"></i>Manage Employer</a></li>
            <li class="nav-item"><a href="{{ route('admin.manageAttribute') }}" class="nav-link {{ route('admin.manageAttribute') == url()->current() ? 'text-primary' : '' }}"><i class="navbar-icon icon-job-application"></i>Manage Attributes</a></li>
            <li class="nav-item"><a href="{{ route('admin.manageVacancy') }}" class="nav-link {{ route('admin.manageVacancy') == url()->current() ? 'text-primary' : '' }}"><i class="navbar-icon icon-recuirment"></i>Job Vacancies</a></li>
            <li class="nav-item"><a href="{{ route('admin.jobSkills') }}" class="nav-link {{ route('admin.jobSkills') == url()->current() ? 'text-primary' : '' }}"><i class="navbar-icon icon-recuirment"></i>Job Skills</a></li>
            <li class="nav-item">
                <a href="{{ route('admin.cms.setting.edit') }}" class="nav-link {{ route('admin.cms.setting.edit') == url()->current() ? 'text-primary' : '' }}">
                    <i class="navbar-icon icon-setting"></i>Setting
                </a>
            </li>
            {{--<!-- <li class="nav-item"><a href="javascript:void(0)" class="nav-link"><i class="navbar-icon icon-recuirment"></i>Recruitment</a></li>
            <li class="nav-item"><a href="javascript:void(0)" class="nav-link"><i class="navbar-icon icon-on-board"></i>On Boarding</a></li>
            <li class="nav-item"><a href="javascript:void(0)" class="nav-link"><i class="navbar-icon icon-job-application"></i>Applications</a></li>
            <li class="nav-item"><a href="javascript:void(0)" class="nav-link"><i class="navbar-icon icon-team"></i>Team</a></li>
            <li class="nav-item"><a href="javascript:void(0)" class="nav-link"><i class="navbar-icon icon-view-eye"></i>Number Of Views</a></li>
            <li class="nav-item"><a href="javascript:void(0)" class="nav-link"><i class="navbar-icon icon-job-vacancy"></i>Job Vacancy Engagement</a></li> -->
            <!-- <li class="nav-item"><a href="javascript:void(0)" onclick="$('#logout_form').submit()" class="nav-link"><i class="navbar-icon icon-lock"></i>Logout</a></li> -->--}}
        </ul>
        <!-- Aside Nav End Here -->
    </aside>
    <!--========= Aside Content End Here =========-->
    <form action="{{ route('logout') }}" method="POST" id="logout_form">
        @csrf
    </form>