<li class="list-inline-item dropdown notif">
    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false"
       aria-expanded="false">
        <img
            @if(blank(Auth::user()->avatar))
            src="images/avatars/admin.png"
            @else
            src="images/avatars/{{Auth::user()->avatar}}"
            @endif
            alt="Profile image" class="avatar-rounded">
    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
        <!-- item-->
        <div class="dropdown-item noti-title">
            <h5 class="text-overflow">
                <small>Hi, {{Auth::user()->name}}</small>
            </h5>
        </div>

        <!-- item-->
        <a href="{{route('admin.user.profile')}}" class="dropdown-item notify-item">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>

        <!-- item-->
        <form method="post" action="{{route('logout')}}">
            @csrf
            @method('post')
            <button type="submit" class="dropdown-item notify-item">
                <i class="fas fa-power-off"></i>
                <span>Logout</span>
            </button>

        </form>
    </div>
</li>
