<nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">

        {{--Alert--}}
        @include('backend.layout.header.alert')

        {{--Profile--}}
        @include('backend.layout.header.profile')

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="float-left">
            <button class="button-menu-mobile open-left">
                <i class="fas fa-bars"></i>
            </button>
        </li>
    </ul>

</nav>