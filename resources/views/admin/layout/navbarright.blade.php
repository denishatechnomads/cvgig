<div class="navbar-right">
    <ul class="navbar-nav">
        <li>
            <a href="{{ route('logout') }}" class="mega-menu" title="Sign Out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="zmdi zmdi-power"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</div>
