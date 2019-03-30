<div class="jumbotron jumbotron-fluid text-white" style="margin-top: 52.7667px" id="bg-section">
    <div class="container">
        <h1 class="display-4" style="font-family: League Spartan, sans-serif; font-weight: bold">Yoga Hilmi's Blog 👋🏽</h1>
        <p class="lead">Welcome to my Personal Blog</p>
    </div>
</div>
<div class="container mb-3">
    <div class="row">
        <div class="col-lg-9 col-md-9">
            <article class="text-dark">
                <h2 class="h2">📄 Posts</h2>
                <hr>
                <?php foreach ($posts as $row) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <h4 class="card-title"><?= $row['title'] ?></h4>
                            </div>
                            <div class="col-lg-4 col-md-4 text-right">
                                <span class="badge badge-pill badge-secondary"><i class="mdi mdi-tag-multiple"></i>&nbsp;<?= $row['category'] ?></span>
                            </div>
                        </div>
                        <div class="card-text"><?= substr($row['post'], 0, 140) . "..." ?></div>
                        <a class="btn btn-primary" href="<?= base_url('story/read/') . $row['slug'] ?>">Read More</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </article>
        </div>
        <div class="col-lg-3 col-md-3">
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