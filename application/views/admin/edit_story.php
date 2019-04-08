<div class="row mt-3">
    <div class="col-lg">
        <form method="post" action="">
            <div class="row">
                <input type="hidden" name="post_id" value="<?= $story['id_posts'] ?>">
                <div class="form-group col-lg-6">
                    <label for="post_title">Title</label>
                    <input class="form-control" type="text" name="post_title" id="post_title" value="<?= $story['title'] ?>" required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="post_category">Category</label>
                    <input class="form-control" type="text" name="post_category" id="post_category" value="<?= $story['category'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg">
                    <textarea class="form-control" id="post_main" name="post_main" required>
                    <?= $story['post'] ?>
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <button class="btn btn-primary btn-block btn-lg">Publish</button>
                </div>
            </div>
        </form>
    </div>
</div> 