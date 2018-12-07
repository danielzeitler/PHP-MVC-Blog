
<!-- Bootstrap -->
<div class="col-md-12"></div>
<div class="col-md-2"></div>
<div class="col">
<div class="container">

<ul class="nav nav-tabs" id="myTab" role="tablist">
<?php if(!empty(Debug::$data)): ?>
  <li class="nav-item">
    <a class="nav-link active" id="debug-tab" data-toggle="tab" href="#debug" role="tab" aria-controls="debug" aria-selected="true">Debug</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="this-tab" data-toggle="tab" href="#this" role="tab" aria-controls="this" aria-selected="false">This</a>
  </li>
  <?php else: ?>
  <li class="nav-item">
    <a class="nav-link" id="this-tab" data-toggle="tab" href="#this" role="tab" aria-controls="this" aria-selected="false">This</a>
  </li>
  <?php endif; ?>
  <li class="nav-item">
    <a class="nav-link" id="get-tab" data-toggle="tab" href="#get" role="tab" aria-controls="get" aria-selected="false">$_GET</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="post-tab" data-toggle="tab" href="#post" role="tab" aria-controls="post" aria-selected="false">$_POST</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="session-tab" data-toggle="tab" href="#session" role="tab" aria-controls="session" aria-selected="false">$_SESSION</a>
  </li>

    <?php foreach(Debug::$data as $key => $value): ?>
    <li class="nav-item">
        <a class="nav-link" id="is-numeric-tab" data-toggle="tab" href="#session" role="tab" aria-controls="<?= is_numeric($key) ? 'index'.$key : $key ?>" aria-selected="false"><?= is_numeric($key) ? 'Index: '.$key : $key ?></a>
    </li>
    <?php endforeach; ?>
</ul>


<?php if(!empty(Debug::$data)): ?>
<div class="tab-content" id="myTabContent" role="tablist">

    <div class="tab-pane fade show active" id="debug" role="tabpanel" aria-labelledby="debug">
        <?php Helper::debug(Debug::$data) ?>
    </div>

    <div class="tab-pane fade" id="this" role="tabpanel" aria-labelledby="this">
        <?php Helper::debug($this) ?>
    </div>
    <?php else: ?>
  
    <div class="tab-pane fade" id="this" role="tabpanel" aria-labelledby="this">
        <?php Helper::debug($this) ?>
    </div>
<?php endif; ?>

    <div class="tab-pane fade" id="get" role="tabpanel" aria-labelledby="get">
        <?php Helper::debug($_GET) ?>
    </div>

    <div class="tab-pane fade" id="post" role="tabpanel" aria-labelledby="post">
        <?php Helper::debug($_POST) ?>
    </div>

    <div class="tab-pane fade" id="session" role="tabpanel" aria-labelledby="session">
        <?php Helper::debug($_SESSION) ?>
    </div>

    <?php foreach(Debug::$data as $key => $value): ?>
    <div class="tab-pane fade" id="is-numeric-tab" role="tabpanel" aria-labelledby="<?= is_numeric($key) ? 'index'.$key : $key ?>">
        <?php Helper::debug($value) ?>
    </div>
<?php endforeach; ?>
</div>


</div>
</div>