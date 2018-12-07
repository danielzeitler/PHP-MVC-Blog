<?php include 'partial/sidebar.php'; ?>

    <div class="col">
        <div class="container">
            <!-- Breadcrumbs-->
            <h2>Dashboard</h2>

            <!-- DataTables Example -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th colspan="3">Post Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->posts as $post) : ?>
                        <tr>
                            <td><?= $post->header ?></td>
                            <td><?= $post->category_name ?></td>
                            <td><?= $post->firstname . ' ' . $post->lastname?></td>
                            <?php if(Session::get('user')['permission'] == "Admin"): ?>
                                <td><a href="<?= URL; ?>category/show/<?= $post->id; ?>" class="btn btn-dark">View</a></td>
                                <td><a href="<?= URL; ?>dashboard/edit/<?= $post->id; ?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="<?= URL; ?>dashboard/delete/<?= $post->id; ?>" class="btn btn-danger">Delete</a></td>
                            <?php elseif(Session::get('user')['permission'] == "Editor"): ?>
                                <td><a href="<?= URL; ?>category/show/<?= $post->id; ?>" class="btn btn-dark">View</a></td>
                                <td><a href="<?= URL; ?>dashboard/edit/<?= $post->id; ?>" class="btn btn-primary">Edit</a></td>   
                            <?php elseif(Session::get('user')['permission'] == "Guest"): ?>
                                <td><a href="<?= URL; ?>category/show/<?= $post->id; ?>" class="btn btn-dark">View</a></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



                



    