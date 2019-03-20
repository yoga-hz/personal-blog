<div class="container" style="margin-bottom: 2em;">
    <section class="section">
        <h1 class="title is-1">Stories</h1>
        <h3 class="subtitle">Story that have been writen by me</h3>
    </section>
    <hr>
    <article>
        <div class="columns">
            <div class="column is-three-quarters-desktop is-three-quarters-tablet">
                <div class="box is-radiusless is-shadowless is-paddingless">
                    <a class="button is-primary has-icons-left" href="<?= base_url() ?>story/write/">
                        <i class="fa fa-plus"></i>&nbsp;
                        Add new Story
                    </a>
                </div>
                <?php foreach ($posts as $row) : ?>
                <div class="box">
                    <div class="level">
                        <div class="level-left">
                            <h4 class="title"><?= $row['title'] ?></h4>
                        </div>
                        <div class="level-right">
                            <div class="tag"><i class="fas fa-tag"></i>&nbsp;<?= $row['category'] ?></div>
                        </div>
                    </div>
                    <p class="content"><?= substr($row['post'], 0, 140) . "..." ?></p>
                    <a href="<?= base_url() . "story/stories/" . $row['slug'] ?>" class="button is-info">Read more</a>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="column is-one-quarter-desktop is-one-quarter-tablet ">
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
    </article>

</div>
<footer class="footer has-background-dark has-text-white">
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