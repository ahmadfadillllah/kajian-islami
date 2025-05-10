@include('dashboard.layout.head', ['title' => 'Account'])
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2>User Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="user-profile">
            <div class="row">
                <!-- user profile first-style start-->
                <div class="col-sm-12">
                    <div class="card hovercard text-center">
                        <div class="cardheader"></div>

                        <div class="user-image d-flex justify-content-center position-relative" style="margin-top: -50px;">
                            <div class="position-relative">
                                <div class="avatar">
                                    <img alt="User Avatar" src="{{ asset('dashboard/assets') }}/images/user/7.jpg">
                                </div>
                                <div class="icon-wrapper position-absolute top-0 end-0 translate-middle">
                                    <i class="fi fi-rr-edit"></i>
                                </div>
                            </div>
                        </div>

                        <div class="info">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="user-designation">
                                        <div class="title">
                                            <hr>
                                            <a target="_blank" href="#">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="desc">{{ Auth::user()->role }}</div>
                                    </div>
                                    <a class="btn btn-warning btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#ubahPassword{{Auth::user()->uuid}}">
                                        <i class="fi fi-rr-edit"></i> Ubah Password
                                    </a>
                                    @include('account.modal.ubahPassword')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
