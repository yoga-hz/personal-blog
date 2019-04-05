<div class="row mt-3">
    <div class="col-lg">
        <?= form_open('admin/new_post') ?>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="post_title">Title</label>
                <input class="form-control" type="text" name="post_title" id="post_title">
            </div>
            <div class="form-group col-lg-6">
                <label for="post_category">Category</label>
                <input class="form-control" type="text" name="post_category" id="post_category">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg">
                <textarea class="form-control" id="post_main" name="post_main"></textarea>
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