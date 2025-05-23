<header class="page-header row">
    <div class="logo-wrapper d-flex align-items-center col-auto">
        <div style="display: flex; align-items: center;">
            <a href="#">
                <img class="light-logo img-fluid" src="{{ asset('home') }}/assets/images/logo.png" alt="logo" width="20px"/>
                <img class="dark-logo img-fluid" src="{{ asset('home') }}/assets/images/logo.png" alt="logo" />
            </a>
            <span style="
                margin-left: 10px;
                font-weight: 700;
                font-size: 18px;
                color: white; /* fresh blue-green tone */
            ">
                {{ config('app.name') }}
            </span>
        </div>


        <a class="close-btn toggle-sidebar" href="javascript:void(0)">
            <i class="fi fi-rr-apps-add"></i>
        </a>

    </div>
    <div class="page-main-header col">
        <div class="header-left">
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                placeholder="Search Admiro .." name="q" title="" autofocus="autofocus" />
                            <div class="spinner-border Typeahead-spinner" role="status"><span
                                    class="sr-only">Loading...</span></div><i class="close-search"
                                data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="form-group-header d-lg-block d-none">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative d-flex align-items-center">
                        <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Cari Masjid..." name="q" title="" /><i class="fi fi-rr-search"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-right">
            <ul class="header-right">

                <li class="search d-lg-none d-flex">
                    <a href="javascript:void(0)">
                        <svg>
                            <use href="https://admin.pixelstrap.net/admiro/assets/svg/iconly-sprite.svg#Search">
                            </use>
                        </svg>
                    </a>
                </li>
                <li> <a class="dark-mode" href="javascript:void(0)">
                    <i class="fi fi-rr-dark-mode-alt"></i></a>
                </li>
                <li><a class="full-screen" href="javascript:void(0)">
                    <i class="fi fi-rr-expand"></i></a>
                </li>


                <li class="profile-nav custom-dropdown">
                    <div class="user-wrap">
                        <div class="user-img"><img src="{{ asset('dashboard/assets') }}/images/profile.png"
                                alt="user" /></div>
                        <div class="user-content">
                            <h6>{{ Auth::user()->name }}</h6>
                            <p class="mb-0">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    <div class="custom-menu overflow-hidden">
                        <ul class="profile-body">
                            <li class="d-flex">
                                <i class="fi fi-rr-user-pen"></i>
                                <a class="ms-2" href="{{ route('account.index') }}">Account</a>

                            </li>
                            <li class="d-flex">
                                <i class="fi fi-rr-sign-out-alt"></i><a class="ms-2" href="{{ route('logout') }}">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="page-body-wrapper">
