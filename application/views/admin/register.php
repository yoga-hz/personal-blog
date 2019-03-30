<div class="account-pages mt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="<?= base_url() ?>">
                                <span><img src="<?= base_url('assets/') ?>img/favicon.png" alt="brand_logo" height="64"></span>
                            </a>
                            <p class="text-muted mt-3">Don't have an account? Create free account</p>
                        </div>

                        <form action="<?= base_url('admin/register') ?>" method="POST">
                            <div class="form-group mb-3">
                                <label for="fullname">Full Name</label>
                                <input class="form-control" type="text" value="<?= set_value('full_name') ?>" placeholder="Enter your name" name="full_name">
                                <?= form_error('full_name', '<small class="text-danger">', '</small>') ?>
                            </div>

                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" value="<?= set_value('email') ?>" placeholder="Enter your email" name="email">
                                <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" placeholder="Enter your password" name="password">
                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="password">Re-enter Password</label>
                                        <input class="form-control" type="password" id="repassword" placeholder="Re-enter your password" name="repassword">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-block" style="background-color: #9c27b0 !important" type="submit"> Register For FREE! </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? <a href="<?= base_url('admin/') ?>" class="text-dark ml-1"><b>Log In</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page --> 