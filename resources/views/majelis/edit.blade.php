@include('dashboard.layout.head', ['title' => 'Majelis'])
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
                    <h3>Edt Data Majelis</h3>
                  </div>
                  <div class="card-body custom-input">
                    <form action="{{ route('majelis.update', $dataMajelis->uuid) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="lokasiMasjid">Lokasi Masjid</label>
                                    <select class="form-select" id="select" name="masjid_id">
                                        <option value="{{ $dataMajelis->masjid_id }}" selected>{{ $dataMajelis->nama_masjid }}</option>
                                        @foreach ($dataMasjid as $masjid)
                                            <option value="{{ $masjid->id }}">{{ $masjid->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="namaMajelis">Nama Majelis</label>
                                    <input class="form-control" id="namaMajelis" type="text" name="nama" value="{{ $dataMajelis->nama }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="jenisMajelis">Jenis Majelis</label>
                                    <input class="form-control" id="jenisMajelis" type="text" name="jenis" value="{{ $dataMajelis->jenis }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="kegiatanMajelis">Kegiatan Majelis</label>
                                    <input class="form-control" id="kegiatanMajelis" type="text" name="kegiatan" value="{{ $dataMajelis->kegiatan }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="typeMajelis">Type</label>
                                    <select class="form-select" id="typeMajelis" name="type">
                                        <option value="{{ $dataMajelis->type }}" selected>{{ $dataMajelis->type }}</option>
                                        <option value="Gratis">Gratis</option>
                                        <option value="Berbayar">Berbayar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="streamingKultum">Link Streaming</label>
                                    <input class="form-control" id="streamingKultum" type="text" name="streaming" value="{{ $dataMajelis->streaming }}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" id="hargaContainer" >
                                <div class="mb-3">
                                    <label class="form-label" for="hargaMajelis">Harga</label>
                                    <input class="form-control" id="hargaMajelis" type="text" name="harga" value="Rp{{ number_format($dataMajelis->harga, 0, ',', '.') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="editor">Deskripsi</label>
                                <textarea id="editor" name="deskripsi" style="width: 800px; height: 300px;">{{ $dataMajelis->deskripsi }}</textarea>
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
        const selectElement = document.getElementById('typeMajelis');
        const hargaContainer = document.getElementById('hargaContainer');
        const hargaInput = document.getElementById('hargaMajelis');

        selectElement.addEventListener('change', function () {
            if (this.value === 'Berbayar') {
                hargaContainer.style.display = 'block';
                hargaInput.required = true;
            } else {
                hargaContainer.style.display = 'none';
                hargaInput.required = false;
                hargaInput.value = '';
            }
        });

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
