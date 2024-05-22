<?php

use Framework\Session;
?>
<nav class="navbar navbar-expand-lg p-3" id="navbar">
    <a class="navbar-brand" href="/">
        <span style="color:rgb(0, 149, 255)">&#60;</span> JobAds <span style="color:rgb(0, 149, 255)">/&#62;</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav me-auto"> 
            <li class="nav-item">
                <a href="/listings" class="nav-link fs-5">All Job</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto d-flex align-items-center"> 
            <?php if (Session::has('user')) : ?>
                <li class="nav-item">
                    <p class="p-2 fs-6 text-light mb-0">Welcome <?= Session::get('user')['name'] ?></p>
                </li>

                <li class="nav-item">
                    <a href="/listings/create" class="nav-link fs-5 btnPostJob">Post Job</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="/auth/logout">
                        <button type="submit" class="nav-link fs-5">Logout</button>
                    </form>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a href="/auth/login" class="nav-link fs-5">Login</a>
                </li>
                <li class="nav-item">
                    <a href="/auth/register" class="nav-link fs-5">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
