<?php
//require_once '../views/partials/hero.php';
// require basePath('App/views/partials/hero.php');
loadPartials('head');
loadPartials('nav');
loadPartials('hero');
loadPartials('search');
?>

<section>
<div> <h2 class="text-center text-light mb-5 border border-light-subtle border border-end-0 border border-start-0 p-3">Recent Jobs</h2></div>

    <div class="row row-cols-1 row-cols-xl-2 g-4 mx-auto ">

        <?php foreach ($listings as $listing) : ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="card-text"><a href="/listings/<?= $listing->id ?>"><?= $listing->title ?></a></h5>
                                <h6 class="card-text"><?= $listing->company ?></h6>
                                <p class="card-text"><?= $listing->role_summary ?></p>
                                <p><i class="fa-solid fa-location-dot"></i> <?= $listing->work_location ?></p>
                                <p><i class="fa-solid fa-clock"></i> <?= $listing->valid_until ?></p>
                                <p>
                                <?php $tags = explode(',', $listing->tags); ?>
                                <?php foreach ($tags as $tag) : ?>
                                 <span class="tags"><?= mb_strtoupper($tag) ?></span>
                                 <?php endforeach; ?>
                                </p>
                            </div>
                            <!-- <div class="col-4">
                                <img src="images/c1.png" class="mb-2" style="width: 100px;" alt="...">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 10vh;">
        <a href="/listings" class="text-center text-light fs-4">
            <i class="fa fa-arrow-alt-circle-right"></i>
            Show All Jobs
        </a>
    </div>
</section>
<?php
loadPartials('footer');

?>