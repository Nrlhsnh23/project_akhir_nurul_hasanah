<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Create new data</h5>
            <?php if (session()->getFlashdata('errors')) { ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            <?php } ?>
            <form action="/main" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="example-main-nama">Nama UMKM</label>
                    <input type="text" class="form-control" id="example-main-nama" aria-describedby="emailHelp"
                        placeholder="Enter Nama UMKM" required name="nama">
                </div>


                <div class="form-group">
                    <label for="example-main-kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="example-main-kecamatan" aria-describedby="emailHelp"
                        placeholder="Enter main kecamatan" required name="kecamatan">
                </div>

                <div class="form-group">
                    <label for="example-main-lokasi">Lokasi</label>
                    <select class="form-control" name="lokasi" id="example-main-lokasi">
                        <option value="Dalam Jabodetabek">Dalam Jabodetabek</option>
                        <option value="Luar Jabodetabek">Luar Jabodetabek</option>
                        
                    </select>
                </div>



                <div class="form-group">
                    <label for="example-main-status_akun_nib">Status Akun NIB</label>
                    <select class="form-control" name="status_akun_nib" id="example-main-status_akun_nib">
                        <option value="Selesai">Selesai</option>
                        <option value="Tidak Bisa Dilanjut"> Tidak Bisa Dilanjut</option>
                        <option value="NIB Sudah Ada">NIB Sudah Ada</option>
                    </select>
                </div>

                <div class="form-group" id="alasan-tidak-lanjut-group" style="display: none;">
                 <label for="example-main-alasan_tidak_lanjut">Alasan Tidak Lanjut</label>
                 <input type="text" class="form-control" id="example-main-alasan_tidak_lanjut"
                 aria-describedby="emailHelp" placeholder="Enter Alasan Tidak Lanjut" required name="alasan_tidak_lanjut">
                </div>

                <div class="form-group">
                    <label for="example-main-pendaftaran">Pendaftaran</label>
                    <select class="form-control" name="pendaftaran" id="example-main-pendaftaran">
                        <option value="Online">Online</option>
                        <option value="Offline">Offline</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="example-main-waktu_pembuatan">Waktu Pembuatan</label>
                    <select class="form-control" name="waktu_pembuatan" id="example-main-waktu_pembuatan">
                        <option value="Sama">Sama</option>
                        <option value="Normal">Normal</option>
                        <option value="Lebih Lambat">Lebih Lambat</option>
                        <option value="Tidak Bisa Dilanjut">Tidak Bisa Dilanjut</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    const statusAkunNIBSelect = document.getElementById('example-main-status_akun_nib');
    const alasanTidakLanjutGroup = document.getElementById('alasan-tidak-lanjut-group');
    const alasanTidakLanjutInput = document.getElementById('example-main-alasan_tidak_lanjut');

    statusAkunNIBSelect.addEventListener('change', () => {
        if (statusAkunNIBSelect.value === 'Tidak Bisa Dilanjut') {
            alasanTidakLanjutGroup.style.display = 'block';
            alasanTidakLanjutInput.setAttribute('required', 'required');
        } else {
            alasanTidakLanjutGroup.style.display = 'none';
            alasanTidakLanjutInput.removeAttribute('required');
        }
    });
</script>

<?= $this->endSection() ?>