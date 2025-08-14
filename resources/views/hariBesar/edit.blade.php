@include('dashboard.layout.head', ['title' => 'Hari Besar'])
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
                    <h3>Edit Data Hari Besar</h3>
                  </div>
                  <div class="card-body custom-input">
                    <form action="{{ route('haribesar.update', $dataHariBesar->uuid) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="lokasiMasjid">Lokasi Masjid</label>
                                    <select class="form-select" id="select" name="masjid_id">
                                        <option value="{{ $dataHariBesar->masjid_id }}" selected>{{ $dataHariBesar->nama_masjid }}</option>
                                        @foreach ($dataMasjid as $masjid)
                                            <option value="{{ $masjid->id }}">{{ $masjid->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="namaHariBesar">Nama Hari Besar</label>
                                    <input class="form-control" id="namaHariBesar" type="text" name="nama" value="{{ $dataHariBesar->nama }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="jenisHariBesar">Jenis Hari Besar</label>
                                    <input class="form-control" id="jenisHariBesar" type="text" name="jenis" value="{{ $dataHariBesar->jenis }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="namaPenceramah">Nama Penceramah</label>
                                    <input class="form-control" id="namaPenceramah" type="text" name="penceramah" value="{{ $dataHariBesar->penceramah }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="namaImam">Nama Imam Masjid</label>
                                    <input class="form-control" id="namaImam" type="text" name="imam" value="{{ $dataHariBesar->imam }}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggalKegiatan">Tanggal Kegiatan</label>
                                    <input class="form-control" id="tanggalKegiatan" type="text" name="tanggalKegiatan" required value="{{ \Carbon\Carbon::parse($dataHariBesar->tanggal_kegiatan)->format('d/m/Y') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="durasiHariBesar">Durasi</label>
                                    <input class="form-control" id="durasiHariBesar" type="text" name="durasi" value="{{ $dataHariBesar->durasi }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="typeHariBesar">Type</label>
                                    <select class="form-select" id="typeHariBesar" name="type">
                                        <option value="{{ $dataHariBesar->type }}" selected>{{ $dataHariBesar->type }}</option>
                                        <option value="Gratis">Gratis</option>
                                        <option value="Berbayar">Berbayar</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="streamingPengajian">Link Streaming</label>
                                    <input class="form-control" id="streamingPengajian" type="text" name="streaming" value="{{ $dataHariBesar->streaming }}">
                                </div>
                            </div>
                            <div class="col-md-6" id="hargaContainer">
                                <div class="mb-3">
                                    <label class="form-label" for="hargaHariBesar">Harga</label>
                                    <input class="form-control" id="hargaHariBesar" type="text" name="harga" value="Rp{{ number_format($dataHariBesar->harga, 0, ',', '.') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="editor">Deskripsi</label>
                                <textarea id="editor" name="deskripsi" style="width: 800px; height: 300px;">{{ $dataHariBesar->deskripsi }}</textarea>
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
        const selectElement = document.getElementById('typeHariBesar');
        const hargaContainer = document.getElementById('hargaContainer');
        const hargaInput = document.getElementById('hargaHariBesar');

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

@include('ckeditor.index')
@include('dashboard.layout.footer')
