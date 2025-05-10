<div id="editMasjid{{ $dm->uuid }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="myExtraLargeModal">Edit Masjid</h3>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body dark-modal">
                <form action="{{ route('masjid.update', $dm->uuid) }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label text-start d-block" for="namaMasjid">Nama Masjid</label>
                            <input class="form-control" id="namaMasjid" type="text" name="nama" value="{{ $dm->nama }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label text-start d-block" for="alamatMasjid">Alamat</label>
                            <input class="form-control" id="alamatMasjid" type="text" name="alamat" value="{{ $dm->alamat }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label text-start d-block" for="pengurusMasjid">Nama Pengurus</label>
                            <input class="form-control" id="pengurusMasjid" type="text" name="pengurus" value="{{ $dm->pengurus }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label text-start d-block" for="imamMasjid">Imam Masjid</label>
                            <input class="form-control" id="imamMasjid" type="text" name="imam" value="{{ $dm->imam }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
