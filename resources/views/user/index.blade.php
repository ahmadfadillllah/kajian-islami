@include('dashboard.layout.head', ['title' => 'Users'])
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
                        <h3 class="mb-0">Daftar Pengguna</h3>
                        @if (Auth::user()->role == 'Admin')
                        <a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#insertUser">
                            <i class="fi fi-rr-add"></i> Tambah
                        </a>
                        @endif
                        @include('user.modal.insert')
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $us)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $us->username }}</td>
                                        <td>{{ $us->name }}</td>
                                        <td>{{ $us->role }}</td>
                                        @if (Auth::user()->role == 'Admin')
                                            <td>
                                                @if ($us->statusenabled == true)
                                                    <a href="{{ route('user.statusEnabled', $us->uuid ) }}" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" >Disabled</a>
                                                @else
                                                    <a href="{{ route('user.statusEnabled', $us->uuid ) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip">Enabled</a>
                                                @endif
                                                <a href="{{ route('user.resetPassword', $us->uuid ) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip">Reset Password</a>
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
