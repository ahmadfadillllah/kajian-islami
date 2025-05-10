<aside class="page-sidebar">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div class="main-sidebar" id="main-sidebar">
        <ul class="sidebar-menu" id="simple-bar">
            <li class="pin-title sidebar-main-title">
                <div>
                    <h5 class="sidebar-title f-w-700">Pinned</h5>
                </div>
            </li>
            <li class="sidebar-main-title">
                <div>
                    <h5 class="lan-1 f-w-700 sidebar-title">General</h5>
                </div>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="fi fi-rr-home"></i>
                    <h6 class="f-w-600">Dashboard</h6>
                </a>
            </li>


            <li class="sidebar-main-title">
                <div>
                    <h5 class="f-w-700 sidebar-title pt-3">Application</h5>
                </div>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('masjid.index') }}">
                    <i class="fi fi-rr-mosque-moon"></i>
                    <h6 class="f-w-600">Masjid</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('verifikasi.index') }}">
                    <i class="fi fi-rr-memo-circle-check"></i>
                    <h6 class="f-w-600">Verifikasi</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('pengajian.index') }}">
                    <i class="fi fi-rr-lead-management"></i>
                    <h6 class="f-w-600">Pengajian</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('tpa.index') }}">
                    <i class="fi fi-rr-street-view"></i>
                    <h6 class="f-w-600">TPA</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('kultum.index') }}">
                    <i class="fi fi-rr-meeting"></i>
                    <h6 class="f-w-600">Kultum</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('majelis.index') }}">
                    <i class="fi fi-rr-population-globe"></i>
                    <h6 class="f-w-600">Majelis</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('haribesar.index') }}">
                    <i class="fi fi-rr-arrow-up-small-big"></i>
                    <h6 class="f-w-600">Hari Besar</h6>
                </a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h5 class="f-w-700 sidebar-title pt-3">Other</h5>
                </div>
            </li>
            @if (Auth::user()->role == 'Admin')
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('user.index') }}">
                    <i class="fi fi-rr-users-alt"></i>
                    <h6 class="f-w-600">User</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('contact.index') }}">
                    <i class="fi fi-rr-customer-service"></i>
                    <h6 class="f-w-600">Contact</h6>
                </a>
            </li>
            @endif
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('account.index') }}">
                    <i class="fi fi-rr-user-skill-gear"></i>
                    <h6 class="f-w-600">Account</h6>
                </a>
            </li>
            <li class="sidebar-list">
                <a class="sidebar-link" href="{{ route('logout') }}">
                    <i class="fi fi-rr-sign-out-alt"></i>
                    <h6 class="f-w-600">Logout</h6>
                </a>
            </li>
        </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</aside>
