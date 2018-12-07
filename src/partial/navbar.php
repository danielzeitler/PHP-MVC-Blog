<?php
    $categories = Session::get('categories');
    $activeCategory = Session::get('activeCategory');
    // $activeCategoryName = isset($categories[$activeCategory]);
?>
<!-- Following Menu -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo URL; ?>"><?php echo SITENAME; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link <?= (Session::get('controller_name') == 'Home') ? 'active' : '' ?>" href="<?= URL ?>home">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle <?= (Session::get('controller_name') == 'Categories') ? 'active' : '' ?>" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php foreach($categories as $key => $value) : ?>
                        
                        <a class="dropdown-item" href="<?= URL ?>category/showCategory/<?= $key ?>"><?= $value ?></a>

                    <?php endforeach; ?>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= (Session::get('controller_name') == 'About') ? 'active' : '' ?>" href="<?= URL ?>about">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?= (Session::get('controller_name') == 'Contact') ? 'active' : '' ?>" href="<?= URL ?>contact">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if(Session::get('user')): ?>
            <li class="nav-item">
                <a class="nav-link d-flex <?= (Session::get('controller_name') == 'Dashboard') ? 'active' : '' ?>" href="<?= URL ?>dashboard">
                    <img src="<?= (empty(Session::get('user')['image'])) ? DEFAULT_IMG : URL . Session::get('user')['image'] ?>" width="24" height="24" class="mr-2" alt="" style="border-radius: 50%">
                    <div>Welcome <?= Session::get('user')['firstname'] ?></div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=URL?>auth/logout">Logout</a>
            </li>
            <?php else : ?> 
            <li class="nav-item">
                <a class="nav-link" href="<?=URL?>auth/register">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL?>auth/login">Login</a>
            </li>   
            <?php endif; ?>
        </ul>
        </div>
    </div>
</nav>





