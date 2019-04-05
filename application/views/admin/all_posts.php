<div class="row container-fluid mt-3">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <table id="table_posts" class="table dt-bootstrap4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Date Modified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($posts as $row) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td><?= $status = ($row['is_published'] == 1) ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-secondary">Hidden</span>'; ?></td>
                            <td><?= date("l, d F Y H:i", strtotime($row['date'])) ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light" type="button" id="ddAction" data-toggle="dropdown" aria-expanded="false">
                                        <span class="mdi mdi-dots-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ddAction" style="box-shadow: 0 2px 10px 0 lightgrey">
                                        <a class="dropdown-item" href="<?= base_url('admin/edit_post/') . $row['id_posts'] ?>">Edit</a>
                                        <a class="dropdown-item text-light bg-danger" href="<?= base_url('admin/delete_post/') . $row['id_posts'] ?>">Delete</a>
                                        <a class="dropdown-item" href="#">???</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> 