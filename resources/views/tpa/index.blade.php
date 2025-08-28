@include('dashboard.layout.head', ['title' => 'TPA'])
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
                        <h3 class="mb-0">Daftar TPA</h3>
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
                                        <th>Lokasi</th>
                                        <th>Nama TPA</th>
                                        <th>Jenis TPA</th>
                                        <th>Nama Ustadz</th>
                                        <th>Tanggal Kegiatan</th>
                                        <th>Durasi</th>
                                        <th>Type</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        @if (Auth::user()->role == 'Pengurus')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataTPA as $tpa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tpa->nama_masjid }}</td>
                                        <td>{{ $tpa->nama }}</td>
                                        <td>{{ $tpa->jenis }}</td>
                                        <td>{{ $tpa->ustadz }}</td>
                                        <td>{{ \Carbon\Carbon::parse($tpa->tanggal_kegiatan)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $tpa->durasi }}</td>
                                        <td>
                                            @if ($tpa->type === 'Berbayar')
                                                <span class="badge bg-danger">Berbayar</span>
                                            @elseif ($tpa->type === 'Gratis')
                                                <span class="badge bg-primary">Gratis</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $tpa->type }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($tpa->tanggal_kegiatan >= \Carbon\Carbon::now())
                                                <span class="badge bg-secondary">Belum Terlaksana</span>
                                            @else
                                                <span class="badge bg-success">Terlaksana</span>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($tpa->harga, 0, ',', '.') }}</td>
                                        @if (Auth::user()->role == 'Pengurus')
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="{{ route('tpa.edit', $tpa->uuid) }}"><i class="fi fi-rr-edit"></i></a></li>
                                                <li class="delete"><a href="#"><i class="fi fi-rr-trash" data-bs-toggle="modal" data-bs-target="#deleteTPA{{ $tpa->uuid }}"></i></a></li>
                                            </ul>
                                        </td>
                                        @endif
                                    </tr>
                                    @include('tpa.modal.delete')
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
