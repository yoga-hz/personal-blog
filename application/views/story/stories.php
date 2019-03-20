<div class="container">
    <div class="columns" style="margin-top: 1.5em">
        <div class="column is-four-fifths-desktop">

            <div class="box is-radiusless" style="min-height: 450px">
                <h1 class="title"><?= $title->title ?></h1>
                <div class="level">
                    <div class="level-left">
                        <h3 class="subtitle is-5"><?= date("l, d F Y H:i", strtotime($stories['date'])) ?></h3>
                    </div>
                    <div class="level_right">
                        <div class="tag">
                            <i class="fa fa-tags"></i>&nbsp;
                            <?= $stories['category'] ?>
                        </div>
                    </div>
                </div>
                <hr>
                <p class="content">
                    <?= $stories['post'] ?>
                </p>
            </div>

        </div>
        <div class="column is-one-fifths-desktop is-one-fifths-tablet ">
            <div class="panel is-radiusless is-shadowless">
                <div class="panel-heading">
                    Categories
                </div>
                <?php foreach ($category as $row) : ?>
                <a href="<?= base_url() ?>story/category/<?= $row['category'] ?>" class="panel-block">
                    <span class="panel-icon">
                        <i class="mdi mdi-chevron-right-circle"></i>
                    </span>
                    <?= ucfirst($row['category']) ?>
                </a>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<footer class="footer has-background-dark has-text-white" style="margin-top: 2em">
    <div class="container">
        <div class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Read</p>
                    <p class="title has-text-white"><i class="mdi mdi-book-open"></i></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Share</p>
                    <p class="title has-text-white"><i class="mdi mdi-share-variant"></i></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Like</p>
                    <p class="title has-text-white"><i class="mdi mdi-thumb-up"></i></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading">Comments</p>
                    <p class="title has-text-white"><i class="mdi mdi-chat"></i></p>
                </div>
            </div>
        </div>
    </div>
</footer> 