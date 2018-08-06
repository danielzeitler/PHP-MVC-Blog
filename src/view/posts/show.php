<?php
    $data = $this->data; 
?>

<a href="<?php echo URL; ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h1><?php echo $data[0]->header; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data[0]->user_id; ?> on <?php echo $data[0]->timestamp;; ?>
</div>
<p><?php echo $data[0]->content; ?></p>

<!-- < php if($data['post']->user_id == $_SESSION['user_id']) : ?> -->
    <hr>
    <a href="<?php echo URL; ?>posts/edit/<?php echo $data[0]->id; ?>" class="btn btn-dark">Edit</a>

    <form class="pull-right" action="<?php echo URL; ?>posts/delete/<?php echo $data[0]->id; ?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<!-- < php endif; ?> -->

