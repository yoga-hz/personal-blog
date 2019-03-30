<div class="container mb-3" style="margin-top: 5em">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8">
            <article class="text-dark">
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="card-title"><?= $title->title ?></h2>
                        <div class="row">
                            <div class="col-6">
                                <?= date("l, d F Y H:i", strtotime($stories['date'])) ?>
                            </div>
                            <div class="col-6 text-right">
                                <span class="badge badge-pill badge-secondary"><i class="mdi mdi-tag-multiple"></i>&nbsp;<?= $stories['category'] ?></span>
                            </div>
                        </div>
                        <hr>
                        <div class="card-text">
                            <?= $stories['post'] ?>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4">
            <div class="list-group">
                <span class="list-group-item active">
                    <span class="h3">Category</span>
                </span>
                <?php foreach ($category as $row) : ?>
                <a class="list-group-item list-group-item-action" href="<?= base_url('story/category/') . $row['category'] ?>">
                    <i class="mdi mdi-chevron-right-circle"></i>&nbsp;
                    <?= ucfirst($row['category']) ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<footer class="d-flex justify-content-around align-items-center bg-dark text-white p-3 px-auto">
    <div class="text-center">
        <p class="lead">Read</p>
        <h2><i class="mdi mdi-book-open"></i></h2>
    </div>
    <div class="text-center">
        <p class="lead">Share</p>
        <h2><i class="mdi mdi-share-variant"></i></h2>
    </div>
    <div class="text-center">
        <p class="lead">Like</p>
        <h2><i class="mdi mdi-thumb-up"></i></h2>
    </div>
    <div class="text-center">
        <p class="lead">Comment</p>
        <h2><i class="mdi mdi-chat"></i></h2>
    </div>
</footer> 