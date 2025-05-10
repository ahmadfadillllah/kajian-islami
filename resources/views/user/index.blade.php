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
                                        <td>{{ $dp->username }}</td>
                                        <td>{{ $dp->name }}</td>
                                        <td>{{ $dp->role }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="edit"> <a href="{{ route('user.statusEnabled', $us->uuid ) }}"><i class="fi fi-rr-edit"></i></a></li>
                                                <li class="delete"><a href="#"><i class="fi fi-rr-trash" data-bs-toggle="modal" data-bs-target="#statusEnabled{{ $us->uuid }}"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @include('user.modal.statusEnabled')
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
