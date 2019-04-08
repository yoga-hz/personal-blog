<div class="row my-3">
    <div class="col-lg-8">
        <?= form_open() ?>
        <div class="form-group">
            <label for="current_pass">Current Password</label>
            <input type="password" class="form-control" name="current_pass">
            <?= form_error('current_pass', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="form-group">
            <label for="new_pass">New Password</label>
            <input type="password" class="form-control" name="new_pass">
            <?= form_error('new_pass', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="form-group">
            <label for="conf_new_pass">Confirm Password</label>
            <input type="password" class="form-control" name="conf_new_pass">
            <?= form_error('conf_new_pass', '<small class="text-danger">', '</small>') ?>
        </div>
        <button type="submit" class="btn btn-info float-right">Change</button>
        </form>
    </div>
</div>