    <div class="account-pages mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <a href="#">
                                    <span><img src="<?= base_url('assets/') ?>img/favicon.png" alt="" height="64"></span>
                                </a>
                            </div>

                            <?= $this->session->flashdata('message') ?>

                            <form action="<?= base_url('admin/') ?>" method="POST">

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" name="emailaddress" type="email" required value="<?= set_value('emailaddress') ?>" placeholder="Enter your email">
                                    <?= form_error('emailaddress', '<div class="text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" name="password" type="password" required placeholder="Enter your password">
                                    <?= form_error('password', '<div class="text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                </div>

                            </form>
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="<?= base_url('admin/register') ?>" class="text-dark ml-1"><b>Sign Up</b></a></p>
                                </div> <!-- end col -->
                            </div>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page --> 