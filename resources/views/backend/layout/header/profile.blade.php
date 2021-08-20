<li class="list-inline-item dropdown notif">
    <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false"
       aria-expanded="false">
        <img src="images/avatars/admin.png" alt="Profile image" class="avatar-rounded">
    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
        <!-- item-->
        <div class="dropdown-item noti-title">
            <h5 class="text-overflow">
                <small>Hi, Minh Khoa</small>
            </h5>
        </div>

        <!-- item-->
        <a href="profile.html" class="dropdown-item notify-item">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>

        <!-- item-->
        <form method="post" action="">
            @csrf
            @method('put')
            <button type="submit" class="dropdown-item notify-item">
                <i class="fas fa-power-off"></i>
                <span>Logout</span>
            </button>


            </a>
        </form>
    </div>
</li>
