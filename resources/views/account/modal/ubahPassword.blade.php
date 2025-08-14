<div id="ubahPassword{{Auth::user()->uuid}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="myExtraLargeModal">Ubah Password</h3>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body dark-modal">
                <form action="{{ route('account.ubahPassword', Auth::user()->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="passwordBaru">Password baru</label>
                            <input class="form-control" id="passwordBaru" type="text" name="password" required>
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
