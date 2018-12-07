<?php
    $messages = Message::getAll();
    Debug::add($messages, '$messages');
?>


<?php foreach($messages as $key => $value) : ?>
<div class="container">
        <div class="alert alert-<?= $value['class'] ?> position-fixed" data-time="<?= $value['time'] ?>" data-duration="<?= $value['duration'] ?>"><?= $value['text'] ?>
        
            <a class="close" href="?deleteMessage=<?= $key ?>" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    
</div>

<?php endforeach; ?>

