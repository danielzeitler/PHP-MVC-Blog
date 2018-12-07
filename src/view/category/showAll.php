<?php
    $categories = Session::get('categories');
    $activeCategory = Session::get('activeCategory');
    $categoryName = $categories[$activeCategory];
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    // $index = array_search($activeCategory, );

?>

<div class="container">
<h1 class="text-center mt-5">Category: <?= $categoryName ?></h1>
<p class="text-center text-muted mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti non inventore vitae erunt quaerat earum. Perspiciatis commodi necessitatibus quasi voluptatum quisquam incidunt qui, quia ipsam, voluptatibus eligendi aperiam reprehenderit sunt ratione alias vel, corrupti laborum deserunt? Culpa, ut minus.</p>
    
<section>   

<!-- Search function -->
<form id="search_php" method="GET" action="<?= URL ?>category/showCategory/<?= $activeCategory ?>">
    <div class="input-group mb-3">
        <input type="text" value="<?=$search?>" class="form-control" name="search" placeholder="Are you looking for a specific post?" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
        </div>
    </div>
</form>

<!-- Display all posts -->
<div class="card-columns">
<?php foreach($this->posts as $item) : ?>
    <div class="card">
        <a href="<?= URL; ?>category/show/<?= $item->id; ?>">
            <img class="card-img-top" src="<?= URL . $item->image ?>" alt="Card image cap">
        </a>
        <div class="card-body">
                
            <p class="card-text mb-0 text-muted"><small><?= $item->category_name ?></small></p>
                
            <h5 class="card-title"><?= $item->header ?></h5>
            <p class="card-text"><?= substr($item->content, 0, 100) ?>...<a href="<?= URL; ?>category/show/<?= $item->id; ?>">read more</a></p>
            <div class="row">
                <div class="col">
                    <p class="card-text"><small class="text-muted"><?= $item->timestamp ?></small></p>
                </div>

                <div class="col">
                    <p class="card-text pull-right"><small class="text-muted">Posted by: </br><?= $item->firstname . ' ' . $item->lastname?></small></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>


</section>