@include('dashboard.layout.head', ['title' => 'Pengajian'])
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<style>
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
<div class="page-body">
    <br>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-xl-12">
                <div class="card">
                  <div class="card-header card-no-border pb-0">
                    <h3>Edit Data Pengajian</h3>
                  </div>
                  <div class="card-body custom-input">
                    <form action="{{ route('pengajian.update', $dataPengajian->uuid) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="lokasiMasjid">Lokasi Masjid</label>
                                    <select class="form-select" id="select" name="masjid_id">
                                        <option value="{{ $dataPengajian->masjid_id }}" selected>{{ $dataPengajian->nama_masjid }}</option>
                                        @foreach ($dataMasjid as $masjid)
                                            <option value="{{ $masjid->id }}">{{ $masjid->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="namaPengajian">Nama Pengajian</label>
                                    <input class="form-control" id="namaPengajian" type="text" name="nama" value="{{ $dataPengajian->nama }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="jenisPengajian">Jenis Pengajian</label>
                                    <input class="form-control" id="jenisPengajian" type="text" name="jenis" value="{{ $dataPengajian->jenis }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="namaUstadz">Nama Ustadz</label>
                                    <input class="form-control" id="namaUstadz" type="text" name="ustadz" value="{{ $dataPengajian->ustadz }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="durasiPengajian">Durasi</label>
                                    <input class="form-control" id="durasiPengajian" type="text" name="durasi" value="{{ $dataPengajian->durasi }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="typePengajian">Type</label>
                                    <select class="form-select" id="typePengajian" name="type">
                                        <option value="{{ $dataPengajian->type }}" selected>{{ $dataPengajian->type }}</option>
                                        <option value="Gratis">Gratis</option>
                                        <option value="Berbayar">Berbayar</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="hargaPengajian">Harga</label>
                                    <input class="form-control" id="hargaPengajian" type="text" name="harga" value="Rp{{ number_format($dataPengajian->harga, 0, ',', '.') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="streamingPengajian">Link Streaming</label>
                                    <input class="form-control" id="streamingPengajian" type="text" name="streaming" value="{{ $dataPengajian->streaming }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="hargaPengajian">Deskripsi</label>
                                <textarea id="editor" name="deskripsi" style="width: 800px; height: 300px;">{{ $dataPengajian->deskripsi }}</textarea>
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
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const selectElement = document.getElementById('typePengajian');
        const hargaContainer = document.getElementById('hargaContainer');
        const hargaInput = document.getElementById('hargaPengajian');

        hargaInput.addEventListener('input', function (e) {
            let value = this.value.replace(/[^,\d]/g, '').toString();
            let split = value.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            this.value = 'Rp' + rupiah;
        });
    });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'undo', 'redo', '|',
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                'alignment', '|',
                'numberedList', 'bulletedList', '|',
                'link', 'blockQuote', '|',
                'insertTable', 'imageUpload'
            ]
        })
        .then(editor => {
            console.log('Editor aktif:', editor);
        })
        .catch(error => {
            console.error('Editor gagal dimuat:', error);
        });
</script>
@include('dashboard.layout.footer')
