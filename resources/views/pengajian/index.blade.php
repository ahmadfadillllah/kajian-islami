@include('dashboard.layout.head', ['title' => 'Pengajian'])
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
                        <h3 class="mb-0">Daftar Pengajian</h3>
                        @if (Auth::user()->role == 'Pengurus')
                            <a href="{{ route('pengajian.insert') }}" class="btn btn-primary btn-sm"  title="Tambah Data">
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
                                        <th>Nama Pengajian</th>
                                        <th>Jenis Pengajian</th>
                                        <th>Nama Ustadz</th>
                                        <th>Durasi</th>
                                        <th>Type</th>
                                        <th>Harga</th>
                                        @if (Auth::user()->role == 'Pengurus')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPengajian as $dp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dp->nama_masjid }}</td>
                                        <td>{{ $dp->nama }}</td>
                                        <td>{{ $dp->jenis }}</td>
                                        <td>{{ $dp->ustadz }}</td>
                                        <td>{{ $dp->durasi }}</td>
                                        <td>
                                            @if ($dp->type === 'Berbayar')
                                                <span class="badge bg-danger">Berbayar</span>
                                            @elseif ($dp->type === 'Gratis')
                                                <span class="badge bg-primary">Gratis</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $dp->type }}</span>
                                            @endif
                                        </td>
                                        <td>Rp{{ number_format($dp->harga, 0, ',', '.') }}</td>
                                        @if (Auth::user()->role == 'Pengurus')
                                            <td>
                                                <ul class="action">
                                                    <li class="edit"> <a href="{{ route('pengajian.edit', $dp->uuid ) }}"><i class="fi fi-rr-edit"></i></a></li>
                                                    <li class="delete"><a href="#"><i class="fi fi-rr-trash" data-bs-toggle="modal" data-bs-target="#deletePengajian{{ $dp->uuid }}"></i></a></li>
                                                </ul>
                                            </td>
                                        @endif
                                    </tr>
                                    @include('pengajian.modal.delete')
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
