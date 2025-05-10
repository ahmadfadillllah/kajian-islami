@include('dashboard.layout.head', ['title' => 'Dashboard'])
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="page-body">
    <br>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-4 box-col-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <h3>Jumlah Kegiatan</h3>
                    </div>
                    <div class="card-body apex-chart">
                        <div id="jumlahKegiatan"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 box-col-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <h3>Jumlah Pendaftar</h3>
                    </div>
                    <div class="card-body apex-chart">
                        <div id="jumlahPendaftar"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-4 box-col-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <h3>Jumlah Diverifikasi</h3>
                    </div>
                    <div class="card-body apex-chart">
                        <div id="jumlahDiverifikasi"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-sm-12 col-xl-12 box-col-12">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <h3>Data Pendaftaran</h3>
                    </div>
                    <div class="card-body">
                        <div id="mixedchart"> </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Container-fluid ends-->
</div>

@include('dashboard.layout.footer')

<script>
    var totalPengajian = @json($data['pengajian']->count());

    var totalTPA = @json($data['tpa']->count());
    var totalKultum = @json($data['kultum']->count());
    var totalMajelis = @json($data['majelis']->count());
    var totalHariBesar = @json($data['haribesar']->count());

    var verifikasi = @json($data['verifikasi']);
    var jumlahPendaftars = @json($data['verifikasi']->count());


    const kategoriCount = {};
    const verifikatorCount = {};

    verifikasi.forEach(item => {
        const kategori = item.kategori;
        kategoriCount[kategori] = (kategoriCount[kategori] || 0) + 1;
    });

    verifikasi.forEach(item => {
        if (item.verified == 1) {
            const kategori = item.kategori;
            verifikatorCount[kategori] = (verifikatorCount[kategori] || 0) + 1;
        }
    });

    // Siapkan data untuk chart
    const labelsPendaftar = Object.keys(kategoriCount);
    const seriesPendaftar = Object.values(kategoriCount);

    const labelsDiverifikasi = Object.keys(verifikatorCount);
    const seriesDiverifikasi = Object.values(verifikatorCount);



    var jumlahKegiatan = {
    chart: {
        width: 380,
        type: "pie",
    },
    labels: ["Pengajian", "TPA", "Kultum", "Majelis", "Hari Besar"],
    series: [totalPengajian, totalTPA, totalKultum, totalMajelis, totalHariBesar],
    responsive: [
        {
        breakpoint: 100,
        options: {
            chart: {
            width: 200,
            },
            legend: {
            show: false,
            },
        },
        },
    ],
    colors: [
            AdmiroAdminConfig.primary,
            AdmiroAdminConfig.secondary,
            "#3eb95f",
            "#ea9200",
            "#e74b2b",
        ],
    };

    var jumlahKegiatans = new ApexCharts(document.querySelector("#jumlahKegiatan"), jumlahKegiatan);

    jumlahKegiatans.render();

    var jumlahPendaftar = {
        chart: {
            height: 250,
            type: "radialBar",
        },
        plotOptions: {
            radialBar: {
            dataLabels: {
                name: {
                fontSize: "22px",
                },
                value: {
                fontSize: "16px",
                },
                total: {
                show: true,
                label: "Total",
                formatter: function (w) {
                    return jumlahPendaftars;
                },
                },
            },
            },
        },
        series: seriesPendaftar,
        labels: labelsPendaftar,
        responsive: [
            {
            breakpoint: 480,
            options: {
                chart: {
                height: 250,
                },
                legend: {
                show: false,
                },
                plotOptions: {
                radialBar: {
                    dataLabels: {
                    name: {
                        offsetY: -1,
                    },
                    value: {
                        offsetY: 4,
                    },
                    },
                },
                },
            },
            },
        ],
        colors: [
            "#02a2b9",
            "#3eb95f",
            "#f39159",
            "#308e87",
        ],
        };

        var chart11 = new ApexCharts(document.querySelector("#jumlahPendaftar"), jumlahPendaftar);

        chart11.render();

        var options9 = {
            chart: {
                width: 380,
                type: "donut",
            },
            labels: labelsDiverifikasi,
            series: seriesDiverifikasi,
            responsive: [
                {
                breakpoint: 480,
                options: {
                    chart: {
                    width: 200,
                    },
                    legend: {
                    show: false,
                    },
                },
                },
            ],
            colors: ["#308e87", "#f39159", "#3eb95f", "#ea9200", "#e74b2b"],
            };

            var jumlahDiverifikasi = new ApexCharts(document.querySelector("#jumlahDiverifikasi"), options9);

            jumlahDiverifikasi.render();
</script>
