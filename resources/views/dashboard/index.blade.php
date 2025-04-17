@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2>Default Dashboard</h2>
                    <p class="mb-0 text-title-gray">Selamat datang kembali! Mari kita lanjutkan dari tempat terakhir kamu berhenti.</p>
                </div>
                <div class="col-sm-6 col-12">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="#">
                            <i class="fi fi-rr-house-chimney"></i></a>
                        </li> --}}
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard">
        <div class="row">
            <div class="col-xl-12 proorder-xxl-1 col-sm-12 box-col-12">
                <div class="card welcome-banner">
                    <div class="card-header p-0 card-no-border">
                        <div class="welcome-card"><img class="w-100 img-fluid"
                                src="{{ asset('dashboard/assets') }}/images/dashboard-1/welcome-bg.png" alt="" /><img
                                class="position-absolute img-1 img-fluid"
                                src="{{ asset('dashboard/assets') }}/images/dashboard-1/img-1.png" alt="" /><img
                                class="position-absolute img-2 img-fluid"
                                src="{{ asset('dashboard/assets') }}/images/dashboard-1/img-2.png" alt="" /><img
                                class="position-absolute img-3 img-fluid"
                                src="{{ asset('dashboard/assets') }}/images/dashboard-1/img-3.png" alt="" /><img
                                class="position-absolute img-4 img-fluid"
                                src="{{ asset('dashboard/assets') }}/images/dashboard-1/img-4.png" alt="" /><img
                                class="position-absolute img-5 img-fluid"
                                src="{{ asset('dashboard/assets') }}/images/dashboard-1/img-5.png" alt="" />
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-center">
                            <h1>Hello, {{ Auth::user()->name }} <img src="{{ asset('dashboard/assets') }}/images/dashboard-1/hand.png"
                                    alt="" /></h1>
                        </div>
                        <p> Selamat datang! Mari kita lanjutkan dari tempat terakhir kamu berhenti.</p>
                        <div class="d-flex align-center justify-content-between"><a class="btn btn-pill btn-primary"
                                href="#">Whats New!</a><span>
                                     <h6 id="clock">Loading...</h6></span>
                            </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xxl-3 col-xl-4 proorder-xxl-2 col-sm-6 box-col-6">
                <div class="card earning-card">
                    <div class="card-header pb-0 card-no-border">
                        <div class="header-top">
                            <h3>Earnings Trend </h3>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="d-flex align-center gap-3">
                            <h2>$4,875</h2><span class="text-primary">
                                36.28%
                                <svg class="stroke-icon stroke-primary">
                                    <use
                                        href="https://admin.pixelstrap.net/admiro/assets/svg/icon-sprite.svg#arrow-down">
                                    </use>
                                </svg></span>
                        </div>
                        <div id="earnings-chart"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-5 proorder-xxl-6 box-col-12">
                <div class="card growthcard">
                    <div class="card-body pb-0">
                        <div id="growth-chart"></div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@include('layout.footer')
<script>
    function updateClock() {
      const now = new Date();

      let hours = now.getHours();
      const minutes = now.getMinutes();
      const seconds = now.getSeconds();
      let period = "AM";

      if (hours >= 12) {
        period = "PM";
      }
      if (hours === 0) {
        hours = 12;
      } else if (hours > 12) {
        hours -= 12;
      }

      const formattedTime =
        (hours < 10 ? "0" + hours : hours) + ":" +
        (minutes < 10 ? "0" + minutes : minutes) + ":" +
        (seconds < 10 ? "0" + seconds : seconds) + " " + period;

      document.getElementById("clock").innerText = "Jam Sekarang: " + formattedTime;
    }

    setInterval(updateClock, 1000); // update setiap 1 detik
    updateClock(); // panggil sekali di awal agar tidak delay 1 detik
  </script>
