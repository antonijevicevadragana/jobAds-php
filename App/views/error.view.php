<?php 
loadPartials('head');
loadPartials('nav');
?>

<div class="d-flex flex-column justify-content-center align-items-center" style="min-height: 40vh;">
    <h2 class="fs-1 text-light"><?= $status ?></h2>
    <p class="fs-3 text-light"> <?= $message ?> </p>
</div>
</body>
</html>


