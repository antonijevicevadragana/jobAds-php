<?php
//require_once '../views/partials/hero.php';
loadPartials('head');
loadPartials('nav');
use Framework\Authorization;
?>

<!-- section for listing -->
<?php if (isset($_SESSION['success_message'])) : ?>
        <div class="bg-success text-light p-3 mx-auto mb-5">
            <p class="text-light"><?= $_SESSION['success_message'] ?> </p>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])) : ?>
        <div class="bg-danger text-light p-3 mx-auto mb-5">
            <p class="text-light"><?= $_SESSION['error_message'] ?> </p>
        </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
<div class="row row-cols-1 row-cols-xl-2 g-4 mx-auto justify-content-center align-items-center mb-5 mt-4 mx-auto" style="min-height: 70vh;">
    <div class="card d-flex justify-content-center align-items-center">
        <div class="card-body">
            <?php if(Authorization::isOwner($listing->user_id)) : ?>
        <form method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <br><a href="/listings/edit/<?= $listing->id ?>" type="button" class="btn btn-info btn-sm"><i class="fa-solid fa-pencil"></i>
                Edit</a>
            <button type="submit" class="btn btn-danger btn-sm delete-button"><i class="fa-solid fa-trash"></i>
                Delete</button>

        </form>
        <?php endif; ?>
            <div class="row">
                <div class="col-8">
                    <h5 class="card-text"><?= $listing->title ?></h5>
                    <h6 class="card-text"><?= $listing->company ?></h6>
                    <p class="card-text"><?= $listing->role_summary ?></p>

                    <p><strong>Job Description: </strong><?= $listing->description ?></p>
                    <p><strong>Requirements: </strong><?= $listing->requirements ?></p>
                    <p><strong>Benefits: </strong><?= $listing->benefits ?></p>

                   <?php if (!empty($listing->salary)) : ?>
                    <p><i class="fa-solid fa-dollar-sign"></i> <?= numberFormating($listing->salary) ?></p>
                    <?php endif; ?>
                    <p><i class="fa-solid fa-location-dot"></i> <?= $listing->work_location ?></p>
                    <p><i class="fa-solid fa-clock"></i> <?= $listing->valid_until ?></p>
                    <p>
                        <?php $tags = explode(',', $listing->tags); ?>
                        <?php foreach ($tags as $tag) : ?>
                            <span class="tags"><?= mb_strtoupper($tag) ?></span>
                        <?php endforeach; ?>
                    </p>


                </div>
                <div class="col-4 d-flex flex-column justify-content-center align-items-center">
                    <!-- <img src="images/c1.png" class="mb-2" style="width: 100px;" alt="..."> -->
                    <p><strong><?= $listing->company ?></strong></p>
                    <p> <i class="fa-solid fa-location-dot"></i><?php echo " " . $listing->address . "," .  $listing->state ?> </p>
                    <p><i class="fa-solid fa-phone"></i> <?= $listing->phone ?></p>


                </div>
                <div class="row">
                    <p><button type="submit" class="formSubmit">
                            Send Us Email
                        </button></p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end section for listing -->


<?php
loadPartials('footer');

?>