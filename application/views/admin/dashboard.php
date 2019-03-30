<div class="row">
    <div class="col-lg-6">
        <?= $this->session->flashdata('message') ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card text-light bg-dark mt-3">
            <div class="card-body">
                <h4 class="card-title"><?= $user['name'] ?></h4>
                <img class="card-img" style="border-radius: 50%" src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="user-image">
                <p class="card-text">
                    <span class="mdi mdi-email"></span>
                    <?= $user['email'] ?>
                    <br>
                    <span class="mdi mdi-clock"></span>
                    Joined on <?= date('d F Y', $user['date_created']) ?>
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-dark text-warning mt-3 widget-flat">
            <div class="card-body p-0">
                <div class="p-3 pb-0">
                    <div class="float-right">
                        <i class="mdi mdi-file-document text-warning widget-icon"></i>
                    </div>
                    <h5 class="text-muted font-weight-normal mt-0">Posts</h5>
                    <h3 class="mt-2"><?= $post ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
    <div class="col-lg-3"></div>
</div> 