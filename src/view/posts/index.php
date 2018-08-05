    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Posts</h1>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URL; ?>posts/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Post
            </a>
        </div>
    </div>

    <?php foreach($this->post as $item) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $item->header; ?></h4>
            <div class="bg-light p-2 mb-3">
                Written by <?php echo $item->user_id; ?> on <?php echo $item->timestamp;?>
            </div>

            <p class="card-text"><?php echo $item->content; ?></p>
            <a href="<?php echo URL; ?>/posts/show/<?php echo $item->postId; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach; ?>
