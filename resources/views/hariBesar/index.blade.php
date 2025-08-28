@include('dashboard.layout.head', ['title' => 'Hari Besar'])
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
                        <h3 class="mb-0">Daftar Hari Besar</h3>
                        @if (Auth::user()->role == 'Pengurus')
                        <a href="{{ route('haribesar.insert') }}" class="btn btn-primary btn-sm" title="Tambah Data">
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
                                        <th>Nama Hari Besar</th>
                                        <th>Jenis Hari Besar</th>
                                        <th>Nama Penceramah</th>
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
                                    @foreach ($dataHariBesar as $hb)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hb->nama_masjid }}</td>
                                        <td>{{ $hb->nama }}</td>
                                        <td>{{ $hb->jenis }}</td>
                                        <td>{{ $hb->penceramah }}</td>
                                        <td>{{ $hb->durasi }}</td>
                                        <td>
                                            @if ($hb->type === 'Berbayar')
                                                <span class="badge bg-danger">Berbayar</span>
                                            @elseif ($hb->type === 'Gratis')
                                                <span class="badge bg-primary">Gratis</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $hb->type }}</span>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($hb->harga, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($hb->tanggal_kegiatan >= \Carbon\Carbon::now())
                                                <span class="badge bg-secondary">Belum Terlaksana</span>
                                            @else
                                                <span class="badge bg-success">Terlaksana</span>
                                            @endif
                                        </td>
                                        @if (Auth::user()->role == 'Pengurus')
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="{{ route('haribesar.edit', $hb->uuid) }}"><i class="fi fi-rr-edit"></i></a></li>
                                                <li class="delete"><a href="#"><i class="fi fi-rr-trash" data-bs-toggle="modal" data-bs-target="#deleteHariBesar{{ $hb->uuid }}"></i></a></li>
                                            </ul>
                                        </td>
                                        @endif
                                    </tr>
                                    @include('hariBesar.modal.delete')
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
