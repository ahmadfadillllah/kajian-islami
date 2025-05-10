<div id="insertMasjid" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="myExtraLargeModal">Tambah Masjid</h3>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body dark-modal">
                <form action="{{ route('masjid.insert') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="namaMasjid">Nama Masjid</label>
                            <input class="form-control" id="namaMasjid" type="text" name="nama" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="alamatMasjid">Alamat</label>
                            <input class="form-control" id="alamatMasjid" type="text" name="alamat" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="pengurusMasjid">Nama Pengurus</label>
                            <input class="form-control" id="pengurusMasjid" type="text" name="pengurus" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="imamMasjid">Imam Masjid</label>
                            <input class="form-control" id="imamMasjid" type="text" name="imam" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="gambarMasjid">Gambar</label>
                            <input class="form-control" id="gambarMasjid" type="file" name="gambar" required>
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
