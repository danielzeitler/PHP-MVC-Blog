
<!-- Header -->
<header class="masthead">
    <div class="container">
        <div class="intro-text">
            <h4 class="text-uppercase">Get started with digital mindfulness</h4>
            <div class="intro-heading">Great technology creates focus, joy, and human </br>connection. Find out how.</div>
            <a class="btn btn-xl text-white text-uppercase" href="<?=URL?>category/showCategory/1">Read More</a><i class="fa fa-angle-right"></i>
        </div>
    </div>
</header>

<section class="section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading">What is Tale Of Mind?</h2>
                <hr class="dark my-4">
                <p class="text-faded mb-4">Tale of Mind is for the passionate, the fearless, and the dreamers who believe. For those who are smart, curious, and conscious, with an open mind, a love for learning, and a deep desire to live a brilliant and vibrant life.</p>
            </div>
        </div>
    </div>
</section>

<!-- Here comes the main content -->
<div class="container"> <!-- START: div#content -->

<!-- Content Cards -->
<section>
    <div class="card-columns">

<?php foreach($this->post as $item) : ?>
        <div class="card d-none">
            <a href="<?= URL; ?>category/show/<?= $item->id; ?>">
                <img class="card-img-top" src="<?= $item->image ?>" alt="Card image cap">
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


    <!-- Pagination start -->
    <div class="mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center" id="cardPagination">

            </ul>
        </nav>
    </div>
</section>
<script>
    let activePage = <?= ACTIVE_PAGE ?>;
    let cardsPerPage = <?= CARDS_PER_PAGE ?>;
</script>

<script src="<?= URL . "public/js/pagination.js" ?>"></script>