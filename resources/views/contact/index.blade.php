@include('dashboard.layout.head', ['title' => 'Contact'])
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
                        <h3 class="mb-0">Daftar Pesan</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Panggilan</th>
                                        <th>Email</th>
                                        <th>No. WhatsApp</th>
                                        <th>Pesan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contact as $cp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cp->nama_lengkap }}</td>
                                        <td>{{ $cp->nama_panggilan }}</td>
                                        <td>{{ $cp->email }}</td>
                                        <td>{{ $cp->no_whatsapp }}</td>
                                        <td>{{ $cp->pesan }}</td>
                                        <td>
                                            <ul class="action">
                                                <li class="delete"><a href="#"><i class="fi fi-rr-trash" data-bs-toggle="modal" data-bs-target="#deleteContact{{ $cp->uuid }}"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @include('contact.modal.delete')
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
