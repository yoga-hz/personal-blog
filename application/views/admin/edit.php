<div class="row my-3">
    <div class="col-lg-8">
        <div class="row mb-2 justify-content-end">
            <div class="col-sm-10">
                <a href="<?= base_url('admin/change_pass/') ?>" class="btn btn-outline-dark btn-sm">Change Password</a>
            </div>
        </div>
        <?= form_open_multipart('admin/edit') ?>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control-plaintext" id="email" name="email" value="<?= $user['email'] ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label text-right">Full name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                <?= form_error('name', "<span class='text-danger'>", "</span>") ?>
            </div>
        </div>
        <div class="form-group row align-items-center">
            <label for="pict" class="col-sm-2 col-form-label text-right">Picture</label>
            <div class="col-sm-10">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" alt="" class="img-thumbnail">
                    </div>
                    <div class="col-lg-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="files" name="gambar">
                            <label class="custom-file-label" for="files">Choose file...</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-end">
            <div class="col-lg-10">
                <button class="btn btn-primary btn-block btn-lg" type="submit">Edit</button>
            </div>
        </div>

        </form>
    </div>
</div>