<?php include 'partial/sidebar.php'; ?>
<?php
    
    $postErr = isset($this->post_err) ? true : false;
    $postErrMsg = isset($this->post_err) ? $this->post_err : '';

?>


<div class="col-md-10">
    <div class="container">
        <!-- Breadcrumbs-->
        <h2>Add post</h2>

            <!-- Add post -->
        <div class="card card-body bg-light mt-4 mb-5">
        <?php if($postErr) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $postErrMsg ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php foreach($this->posts as $post) : ?>
        <form action="<?php echo URL; ?>dashboard/doEdit/<?= $post->id ?>" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="header" class="form-control form-control-lg" value="<?= $post->header ?>">
            </div>

            <div class="form-group">
                <label for="category">Pick a category:</label>
                <select class="form-control" name="category_id">
                    <?php foreach ($this->posts as $post): ?>
                        <option value="<?= $post->id ?>"><?= $post->category_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>   

            <input type="hidden" name="file_id" value="<?= $post->file_id ?>">
            
            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
            </div>

            <div class="form-group inputDnD">
                <label for="title">Current Image:</label>
                <div>
                    <img class="" src="<?= URL . $post->thumb ?>" alt="Card image cap">
                </div>
            </div>

            <div class="form-group inputDnD">
                <label for="title">Upload new Image:</label>
                <input type="file" class="form-control-file text-upload font-weight-bold" name="new_foto" id="inputFile" onchange="readUrl(this)" data-title="Click or Drag and drop a file">
            </div>

            <div class="form-group">
                <label for="body">Your Blog Content:</label>
                <textarea name="content" rows="15" id="post_text" class="form-control form-control-lg"> <?= $post->content ?> </textarea>
            </div>
            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
            
    </div>
</div>
<?php endforeach; ?>






