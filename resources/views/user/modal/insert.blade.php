<div id="insertUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="myExtraLargeModal">Tambah Pengguna</h3>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body dark-modal">
                <form action="{{ route('user.insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="namaMasjid">Username</label>
                            <input class="form-control" id="namaMasjid" type="text" name="username" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="alamatMasjid">Name</label>
                            <input class="form-control" id="alamatMasjid" type="text" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="pengurusMasjid">Role</label>
                            <select class="form-select" name="role" id="" required>
                                <option selected disabled>Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Pengurus">Pengurus</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
