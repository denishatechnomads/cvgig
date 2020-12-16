<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="{{route('dashboard')}}"><img src="{{ asset('assets/images/logo.png') }}" width="70" alt="CVGig"><span class="m-l-10"></span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#">
{{--                            <img src="{{ asset('assets/images/profile_av.jpg') }}" alt="User">--}}
                            <i class="zmdi zmdi-account-circle"></i>
                        </a></div>
                    <div class="detail">
                        <h4>{{Auth::user()->name}}</h4>
                        <small>
                            @if(Auth::user()->type == 'admin')
                                Super Admin
                            @else
                                {{Auth::user()->type}}
                            @endif
                        </small>
                    </div>
                </div>
            </li>
            <li class="{{ Request::segment(2) === 'dashboard' ? 'active open' : null }}"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class="{{ Request::segment(2) === 'template' ? 'active open' : null }}"><a href="{{route('template.index')}}"><i class="zmdi zmdi-assignment"></i><span>Template</span></a></li>
            <li class="{{ Request::segment(2) === 'user' ? 'active open' : null }}"><a href="{{route('user.index')}}"><i class="zmdi zmdi-accounts"></i><span>User</span></a></li>
            <li class="{{ Request::segment(2) === 'payment' ? 'active open' : null }}"><a href="{{route('payment.index')}}"><i class="zmdi zmdi-gradient"></i><span>Payments</span></a></li>
            <li class="{{ Request::segment(2) === 'letter_type' ? 'active open' : null }}"><a href="{{route('letter_type.index')}}"><i class="zmdi zmdi-collection-text"></i><span>Letter type</span></a></li>
            <li class="{{ Request::segment(2) === 'prewritten_content' ? 'active open' : null }}"><a href="{{route('prewritten_content.index')}}"><i class="zmdi zmdi-collection-text"></i><span>Pre written content</span></a></li>
            <li class="{{ Request::segment(2) === 'degree' ? 'active open' : null }}"><a href="{{route('degree.index')}}"><i class="zmdi zmdi-tab"></i><span>Degree</span></a></li>
            <li class="{{ Request::segment(2) === 'contacts' ? 'active open' : null }}"><a href="{{route('contacts.index')}}"><i class="zmdi zmdi-assignment-account"></i><span>User Contact</span></a></li>
{{--            <li class="{{ Request::segment(1) === 'my-profile' ? 'active open' : null }}"><a href="{{route('profile.my-profile')}}"><i class="zmdi zmdi-account"></i><span>My Profile</span></a></li>--}}
        </ul>
    </div>
</aside>
