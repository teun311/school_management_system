
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a href="" class="navbar-brand">LoGo</a>
        <ul class="navbar-nav ">
            <li class="nav-item"><a href="{{route('home')}}"class="nav-link">Home</a></li>
            <li class="nav-item"><a href=""class="nav-link">All Courses</a></li>
            @if(Session::get('student_id'))
                <li class="dropdown">
                    <a href="{{route('user-login')}}" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        {{Session::get('student_name')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('student-dashboard')}}" class="dropdown-item">DashBoard</a></li>
                        <li><a href="" class="dropdown-item" onclick="event.preventDefault();document.getElementById('studentLogoutform').submit();">Logout</a></li>
                        <form action="{{route('student-logout')}}" method="POST" id="studentLogoutform">
                            @csrf
                        </form>
                    </ul>
                </li>

            @else
                <li class="nav-item"><a href="{{route('user-login')}}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{route('user-register')}}" class="nav-link">Register</a></li>
                <li class="nav-item"><a href="" class="nav-link">About</a></li>
            @endif
        </ul>
    </div>
</nav>
