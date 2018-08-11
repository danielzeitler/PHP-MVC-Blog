
<!-- Following Menu -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
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
            <li class="nav-item">
            <a class="nav-link <?= (Session::get('controller_name') == 'Posts') ? 'active' : '' ?>" href="<?= URL ?>posts">Posts</a>
            </li>   
        </ul>

        <ul class="navbar-nav ml-auto">
            <?php if(Session::get('user')): ?>
            <li class="nav-item">
                <a class="nav-link d-flex">
                    <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/o_collection_png/green_dark_grey/256x256/plain/user.png" width="24" height="24" class="mr-2" alt="" style="border-radius: 50%">
                    <div>Welcome <?= Session::get('user')['firstname'] ?>   </div>
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


    <!-- Here comes the main content -->
    <div class="container"> <!-- START: div#content -->
