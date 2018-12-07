<?php
    $data = $this->data; 
    $user = Session::get('user');
?>

<div class="container">
    <!-- Loop to get all data for individual article -->
    <?php foreach($data as $item) : ?>
        <h1 class="text-center mt-5"><?= $item->header; ?></h1>
        <div class="p-2 mb-3 text-center">
            Article posted on <?= $item->timestamp ?> in Category <a class="btn btn-light" href="<?= URL ?>category/showCategory/<?= $item->category_id ?>"><?= $item->category_name; ?></a>
        </div>

        <div class="landscape-img">
            <img src="<?= URL ?><?= $item->image ?>" alt="">
        </div>

        <p class="mt-5"><?= $item->content; ?></p>

        <!-- If user is logged in enable comment feature -->
        <?php if($user) : ?>
            <form class="mb-5" action="<?= URL ?>category/insertComment/<?= $getId = $item->id ?>#commentSubmitted" method="POST">
                <div class="form-group">
                    <label for="comment">Write a comment</label>
                    <textarea class="form-control" name="user_comment"id="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit comment</button>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>

    <!-- Display message when no comments – don't delete if, otherwhise foreach error will occure -->
    <?php if(empty($this->comments)): ?>
        <div class="card card-body bg-light mb-3">
            <p class="mb-0">No comment has been submitted yet.</p>
        </div>
    <?php else: ?>
        <?php foreach($this->comments as $comment) : ?>
            <div class="card card-body bg-light mb-3" id="commentSubmitted">
                <p class="mb-0"><strong class="text-primary"><?= $comment->firstname ?></strong> wrote:</p>
                <p class="mb-4"><?= $comment->comment_content ?></p>
                <small class="text-muted"><?= $comment->timestamp ?></small>
            </div>
        <?php endforeach; ?>
    <?php endif;?>
</div>
