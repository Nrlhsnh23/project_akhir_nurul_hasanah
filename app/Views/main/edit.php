<?= $this->extend('base') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Update data
                <?= $data['nama_umkm'] ?>
            </h5>

            <form action="/main/<?= $data['id'] ?>" method="post">
                <input type="hidden" name="_method" value="put" />
                <div class="form-group">
                    <label for="example-main-nama">Nama UMKM</label>
                    <input type="text" class="form-control" id="example-main-nama" aria-describedby="emailHelp"
                        placeholder="Enter Nama UMKM" required name="nama" value="<?= $data['nama_umkm'] ?>">
                </div>


                <div class="form-group">
                    <label for="example-main-kecamatan">Kecamatan</label>
                    <input type="text" class="form-control" id="example-main-kecamatan" aria-describedby="emailHelp"
                        placeholder="Enter main kecamatan" required name="kecamatan" value="<?= $data['kecamatan'] ?>">
                </div>

                <div class="form-group">
                    <label for="example-main-lokasi">Lokasi</label>
                    <select class="form-control" name="lokasi" id="example-main-lokasi">
                        <option value="Dalam Jabodetabek" <?= ($data['lokasi'] == 'Dalam Jabodetabek') ? 'selected' : ''; ?>>Dalam Jabodetabek</option>
                        <option value="Luar Jabodetabek" <?= ($data['lokasi'] == 'Luar Jabodetabek') ? 'selected' : ''; ?>>Luar Jabodetabek</option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="example-main-status_akun_nib">Status Akun NIB</label>
                    <select class="form-control" name="status_akun_nib" id="example-main-status_akun_nib">
                        <option value="Selesai" <?= ($data['status_akun_nib'] == 'Selesai') ? 'selected' : ''; ?>>
                            Selesai</option>
                        <option value="Tidak Bisa Dilanjut" <?= ($data['status_akun_nib'] == 'Tidak Bisa Dilanjut') ? 'selected' : ''; ?>> Tidak Bisa Dilanjut</option>
                        <option value="NIB Sudah Ada" <?= ($data['status_akun_nib'] == 'NIB Sudah Ada') ? 'selected' : ''; ?>>NIB Sudah Ada</option>
                    </select>
                </div>

                <div class="form-group" id="alasan-tidak-lanjut-group" <?= ($data['status_akun_nib'] === 'Tidak Bisa Dilanjut') ? '' : 'style="display: none;"' ?>>
                    <label for="example-main-alasan_tidak_lanjut">Alasan Tidak Lanjut</label>
                    <input type="text" class="form-control" id="example-main-alasan_tidak_lanjut"
                        aria-describedby="emailHelp" placeholder="Enter Alasan Tidak Lanjut" required name="alasan_tidak_lanjut" value="<?= $data['alasan_tidak_lanjut'] ?>">
                </div>

                <div class="form-group">
                    <label for="example-main-pendaftaran">Pendaftaran</label>
                    <select class="form-control" name="pendaftaran" id="example-main-pendaftaran">
                        <option value="Online" <?= ($data['pendaftaran'] == 'Online') ? 'selected' : ''; ?>>Online
                        </option>
                        <option value="Offline" <?= ($data['pendaftaran'] == 'Offline') ? 'selected' : ''; ?>>Offline
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="example-main-waktu_pembuatan">Waktu Pembuatan</label>
                    <select class="form-control" name="waktu_pembuatan" id="example-main-waktu_pembuatan">
                        <option value="Sama" <?= ($data['waktu_pembuatan'] == 'Sama') ? 'selected' : ''; ?>>Sama</option>
                        <option value="Normal" <?= ($data['waktu_pembuatan'] == 'Normal') ? 'selected' : ''; ?>>Normal</option>
                        <option value="Lebih Lambat" <?= ($data['waktu_pembuatan'] == 'Lebih Lambat') ? 'selected' : ''; ?>>Lebih Lambat</option>
                        <option value="Tidak Bisa Dilanjut" <?= ($data['waktu_pembuatan'] == 'Tidak Bisa Dilanjut') ? 'selected' : ''; ?>>Tidak Bisa Dilanjut</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="example-main-admin">Admin</label>
                    <select class="form-control" name="nama_admin" id="example-main-admin">
                        <option value="Nurul" <?= ($data['nama_admin'] == 'Nurul') ? 'selected' : ''; ?>>Nurul</option>
                        <option value="Fadil" <?= ($data['nama_admin'] == 'Fadil') ? 'selected' : ''; ?>>Fadil</option>
                        <option value="Admin" <?= ($data['nama_admin'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="Mutiara" <?= ($data['nama_admin'] == 'Admin') ? 'selected' : ''; ?>>Mutiara</option>
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

    // Initialize the state based on the pre-selected value
    if (statusAkunNIBSelect.value === 'Tidak Bisa Dilanjut') {
        alasanTidakLanjutGroup.style.display = 'block';
        alasanTidakLanjutInput.setAttribute('required', 'required');
    }
</script>

<?= $this->endSection() ?>