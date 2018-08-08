<?php
    $data = $this->data; 
?>

<a href="<?= URL; ?>posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h1><?= $data[0]->header; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?= $data[0]->firstname . " " . $data[0]->lastname; ?> on <?= $data[0]->timestamp;; ?>
</div>
<p><?= $data[0]->content; ?></p>

<?php if($data['0']->user_id == Session::get('user')['id']) : ?>

    <hr>
    <a href="<?= URL; ?>posts/edit/<?= $data[0]->id; ?>" class="btn btn-dark">Edit</a>

    <form class="pull-right" action="<?= URL; ?>posts/delete/<?= $data[0]->id; ?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>

<?php endif; ?>

