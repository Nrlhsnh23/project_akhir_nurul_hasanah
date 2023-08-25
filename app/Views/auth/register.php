<?= $this->extend('base') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-12">
            <h5 class="mb-4">Register New Admin</h5>
            <?php if (session()->getFlashdata('errors')) { ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('errors') ?>
                </div>
            <?php } ?>
            <form method="post" action="<?= base_url(); ?>/register" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                        please fill in your name
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="2" required autofocus>
                    <div class="invalid-feedback">
                        please fill in your email
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="d-block">Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" tabindex="3" required>
                    <div class="invalid-feedback">
                        please fill in your password
                    </div>
                </div>

                <div class="form-group">
                    <label for="password2" class="d-block">Password Confirmation</label>
                    <input id="password2" type="password" class="form-control" name="password2" tabindex="4" required>
                    <div class="invalid-feedback">
                        please fill in your password confirmation
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
