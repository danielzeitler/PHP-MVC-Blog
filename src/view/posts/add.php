<?php
    
    $postErr = isset($this->post_err) ? true : false;
    $postErrMsg = isset($this->post_err) ? $this->post_err : '';

?>

<a href="<?php echo URL; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<div class="card card-body bg-light mt-5">
    <?php if($postErr) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $postErrMsg ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    <?php endif; ?>

    <h2>Add Post</h2>
    <p>Create a post with this form</p>
    <form action="<?php echo URL; ?>posts/doAdd" method="POST">

        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="header" class="form-control form-control-lg" value="">
        </div>         

        <div class="form-group">
            <label for="body">Body: <sup>*</sup></label>
            <textarea name="content" class="form-control form-control-lg">  </textarea>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>


