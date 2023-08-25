<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('template/head') ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                        <img src="/assets/admin/img/ruhn.jpg" alt="login form" class="img-fluid"/></div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
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
                                    <form action="/login" method="post">

                                        <div class="form-group">
                                            <label for="example-email">Email</label>
                                            <input type="text" class="form-control" id="example-email"
                                                aria-describedby="emailHelp" placeholder="Enter email" name="email"
                                                value="<?= old('email') ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-password">Password</label>
                                            <input type="password" class="form-control" id="example-password"
                                                aria-describedby="emailHelp" placeholder="Enter password"
                                                name="password">
                                        </div>
                                        <br>

                                        <center>
                                        <button type="submit" class="btn btn-primary">Login</button></center>
                                    </form>
                                
                            
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <link href="/assets/admin/assets/vendor/jquery/jquery.min.js">
    </script>
    <link href="/assets/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>

    <!-- Core plugin JavaScript-->
    <link href="/assets/admin/assets/vendor/jquery-easing/jquery.easing.min.js">
    </script>

    <!-- Custom scripts for all pages-->
    <link href="/assets/admin/assets/js/sb-admin-2.min.js">
    </script>

</body>

</html>

