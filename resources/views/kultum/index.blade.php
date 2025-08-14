@include('dashboard.layout.head', ['title' => 'Kultum'])
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
                        <h3 class="mb-0">Daftar Kultum</h3>
                        @if (Auth::user()->role == 'Pengurus')
                        <a href="{{ route('kultum.insert') }}" class="btn btn-primary btn-sm" title="Tambah Data">
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
                                        <th>Judul Kultum</th>
                                        <th>Nama Ustadz</th>
                                        <th>Tangal Kegiatan</th>
                                        <th>Durasi</th>
                                        <th>Type</th>
                                        <th>Harga</th>
                                        @if (Auth::user()->role == 'Pengurus')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataKultum as $kt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kt->nama_masjid }}</td>
                                        <td>{{ $kt->judul }}</td>
                                        <td>{{ $kt->ustadz }}</td>
                                        <td>{{ \Carbon\Carbon::parse($kt->tanggal_kegiatan)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $kt->durasi }}</td>
                                        <td>
                                            @if ($kt->type === 'Berbayar')
                                                <span class="badge bg-danger">Berbayar</span>
                                            @elseif ($kt->type === 'Gratis')
                                                <span class="badge bg-primary">Gratis</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $kt->type }}</span>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($kt->harga, 0, ',', '.') }}</td>
                                        @if (Auth::user()->role == 'Pengurus')
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="{{ route('kultum.edit', $kt->uuid) }}"><i class="fi fi-rr-edit"></i></a></li>
                                                <li class="delete"><a href="#"><i class="fi fi-rr-trash" data-bs-toggle="modal" data-bs-target="#deleteKultum{{ $kt->uuid }}"></i></a></li>
                                            </ul>
                                        </td>
                                        @endif
                                    </tr>
                                    @include('kultum.modal.delete')
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
