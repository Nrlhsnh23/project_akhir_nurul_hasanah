<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tables </h6>
        </div>

        <h6 class="m-0 font-weight-bold text-primary"><a class="nav-link" href="/main/new">New Data</a> </h6>
        <?php if (session()->getFlashData('success')) { ?>
            <div class="alert alert-success">
                <?= session()->get('success') ?>
            </div>
        <?php } ?>

        <?php if (session()->getFlashdata('errors')) { ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('errors') ?>
            </div>
        <?php } ?>

        <div class="float-center ml-2">
                    <form action="" method="get">
                        <div class="float-left">
                            <input type="text" name="keyword" class="form-control" style="width:250pt; height:40px;"
                                placeholder="Search...">
                        </div>
                        <div class="float-left ml-2">
                            <button type="submit" class="btn btn-primary" style="width:50pt; height:40px;" name="tombolcari"><i
                                    class="fas fa-search" ></i></button>
                        </div>
                    </form>
                </div>
      

        <div class="card-body">
            <form action="" method="get">
                <div style="display: flex; align-items: center;">
                   
                    <a href="/export" style="width: 151px; margin-left: auto;" class="btn btn-sm btn-success"><i
                            class="fas fa-download fa-sm text-white-50"></i> Export CSV</a>
                </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="text-align: center;">
                        <tr>
                            <th scope="col ">ID</th>
                            <th scope="col ">Nama UMKM</th>
                            <th scope="col ">Kecamatan</th>
                            <th scope="col ">Lokasi</th>
                            <th scope="col ">Status Akun NIB</th>
                            <th scope="col ">Alasan Tidak Lanjut</th>
                            <th scope="col ">Pendaftaran</th>
                            <th scope="col ">Waktu Pembuatan</th>
                            <th scope="col ">Admin</th>
                            <th scope="col ">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php foreach ($main as $item): ?>
                            <tr>
                                <td style="text-align: center;">
                                    <?= $no += 1; ?>
                                </td>
                                <td>
                                    <?= $item['nama_umkm'] ?>
                                </td>
                                <td>
                                    <?= $item['kecamatan'] ?>
                                </td>
                                <td>
                                    <?= $item['lokasi'] ?>
                                </td>
                                <td>
                                    <?= $item['status_akun_nib'] ?>
                                </td>
                                <td>
                                    <?= $item['alasan_tidak_lanjut'] ?>
                                </td>
                                <td>
                                    <?= $item['pendaftaran'] ?>
                                </td>
                                <td>
                                    <?= $item['waktu_pembuatan'] ?>
                                </td>
                                <td>
                                    <?= $item['nama_admin'] ?>
                                </td>
                                <td style="text-align: center;">
                                    <div class="btn-group " role="group " aria-label="Basic example ">
                                        <form action="/main/<?= $item['id'] ?>" method="POST"
                                            onsubmit="return confirm(`Are you sure?`)">
                                            <a href="/main/<?= $item['id'] ?>/edit" class="btn btn-info text-white "><i
                                                    class='fas fa-pencil-alt'></i></a>
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button class="btn btn-danger text-white" type="submit">
                                                <i class='fas fa-trash'></i>
                                            </button>
                                            <!-- <a href="/export" class="btn btn-success text-white "><i
                                                    class='fas fa-download'></i></a> -->
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12">
            <?= $pager->links('datamagang', 'custom_pagination') ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>