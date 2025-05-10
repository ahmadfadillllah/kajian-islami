@include('dashboard.layout.head', ['title' => 'Verifikasi'])
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<div class="page-body">
    <br>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Daftar Verifikasi</h3>
                        @if (Auth::user()->role == 'Pengurus')
                        <a href="{{ route('tpa.insert') }}" class="btn btn-primary btn-sm" title="Tambah Data">
                            <i class="fi fi-rr-add"></i> Tambah Data
                        </a>
                        @endif
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pendaftar</th>
                                        <th>Username</th>
                                        <th>Kategori</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Type</th>
                                        <th>Harga</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        @if (Auth::user()->role == 'Admin')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($verifikasi as $vr)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $vr->name }}</td>
                                        <td>{{ $vr->username }}</td>
                                        <td>{{ strtoupper($vr->kategori) }}</td>
                                        <td>{{ $vr->detail->nama }}</td>
                                        <td>
                                            @if ($vr->detail->type === 'Berbayar')
                                                <span class="badge bg-danger">Berbayar</span>
                                            @elseif ($vr->detail->type === 'Gratis')
                                                <span class="badge bg-primary">Gratis</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $vr->detail->type }}</span>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($vr->detail->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($vr->detail->type === 'Berbayar')
                                            <a href="{{ asset('storage') }}/{{ $vr->bukti_pembayaran }}" target="_blank">Lihat disini</a></td>
                                            @endif
                                        <td>
                                            @if ($vr->verified == null)
                                                <span class="badge bg-danger">Belum diverifikasi</span>
                                            @else
                                                <span class="badge bg-secondary">Telah diverifikasi</span>
                                            @endif
                                        </td>
                                        @if (Auth::user()->role == 'Admin')
                                            <td>
                                                @if ($vr->verified == null)
                                                    <a href="{{ route('verifikasi.verified', $vr->uuid) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="btn btn-primary btn-sm">Verifikasi</a>
                                                @else
                                                    <a href="{{ route('verifikasi.verified', $vr->uuid) }}" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="btn btn-secondary btn-sm">Tolak</a>
                                                @endif

                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dashboard.layout.footer')
