<?php
    $postErr = isset($this->post_err) ? true : false;
    $postErrMsg = isset($this->post_err) ? $this->post_err : '';
?>

<a href="<?php echo URL; ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <?php if($postErr) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $postErrMsg ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    <?php endif; ?>

    <h2>Edit Post</h2>
    <p>Edit your post with this form</p>
    <?php foreach($this->post as $item): ?>
    <form action="<?php echo URL; ?>posts/doEdit/<?= $item->id ?>" method="POST">

        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="header" class="form-control form-control-lg" value="<?= $item->header ?>">
        </div>         

        <div class="form-group">
            <label for="body">Body: <sup>*</sup></label>
            <textarea name="content" class="form-control form-control-lg"><?= $item->content ?></textarea>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
    <?php endforeach; ?>
</div>





