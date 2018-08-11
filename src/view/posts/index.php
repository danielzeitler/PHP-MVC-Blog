    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
        <?php if(Session::isLoggedIn()) : ?>
            <a href="<?= URL; ?>posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Post
            </a>
        <?php endif; ?>
        </div>
    </div>

    <?php foreach($this->post as $item) : ?>
        <div class="card card-body mb-3">
        <img src="<?= URL . $item->image ?>" alt="" class="card-img-top">
            <h4 class="card-title"><?= $item->header; ?></h4>
            <div class="bg-light p-2 mb-3">
                Written by <?= $item->firstname . " " . $item->lastname ?> on <?= $item->timestamp;?> in category <?= $item->category_name ?>
            </div>

            <p class="card-text"><?= $item->content; ?></p>
            <a href="<?= URL; ?>posts/show/<?= $item->id; ?>" class="btn btn-dark">More</a>
        </div>

<?php endforeach; ?>