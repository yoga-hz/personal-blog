<div class="container">
    <section class="section">
        <h1 class="title is-1">Write new story</h1>
        <h3 class="subtitle">What are you thinking right now?</h3>
    </section>
    <hr>
    <form action="" method="post" class="box is-radiusless">
        <div class="columns">
            <div class="column is-half-desktop is-half-tablet">
                <div class="field">
                    <label for="post_title" class="label">Title</label>
                    <div class="control">
                        <input type="text" class="input <?php $res = (validation_errors()) ? "is-danger" : "";
                                                        echo $res; ?>" name="post_title">
                        <?php if (validation_errors()) : ?>
                        <p class="help is-danger">Fill the post title</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="column is-half-desktop is-half-tablet">
                <div class="field">
                    <label for="post_category" class="label">What category is this story</label>
                    <div class="control">
                        <input type="text" class="input" name="post_category">
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label for="main_post" class="label">Write the story here</label>
                    <div class="control">
                        <textarea id="editor_send" name="main_post" class="textarea"></textarea>
                        <?php if (validation_errors()) : ?>
                        <p class="help is-danger">Please write something here</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="level">
            <div class="level-left">
                <a href="<?= base_url() ?>story/write" class="button has-icon">
                    <i class="mdi mdi-sync"></i>
                </a>
            </div>
            <div class="level-right">
                <button class="button is-info" type="submit">Publish</button>
            </div>
        </div>
    </form>
</div> 