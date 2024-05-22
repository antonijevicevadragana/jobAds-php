<?php
loadPartials('head');
loadPartials('nav');
?>
<section class="formContainer login">
    <div class="content">
        <div class="row justify-content-center frame">
            <h1 class="text-center">Register</h1>
            <hr>
            <?= loadPartials('errors', ['errors' => $errors ?? []])?>
            <form method="POST" action="/auth/register">
            <div class="input-box">
                    <input type="text" class="form-control" name="name" value="<?= $user['name'] ?? '' ?>" placeholder="&#xf007; Name" style="font-family: Arial, FontAwesome">
                </div>
            <div class="input-box">
                    <input type="email" class="form-control" name="email" value="<?= $user['email'] ?? '' ?>" placeholder="&#xf0e0; Email" style="font-family: Arial, FontAwesome">
                </div>
             
                <div class="input-box">
                    <input type="password" class="form-control" name="password" value="" placeholder="&#xf023; Password" style="font-family: Arial, FontAwesome">
                </div>

                <div class="input-box">
                    <input type="password" class="form-control" name="confirmation_password" value="" placeholder="&#xf023; Confirm Password" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <input type="text" class="form-control" name="state" value="<?= $user['state'] ?? '' ?>" placeholder="&#xf3c5; State" style="font-family: Arial, FontAwesome">
                </div>

                <div class="input-box">
                    <input type="text" class="form-control" name="city" value="<?= $user['city'] ?? '' ?>" placeholder="&#xf3c5; City" style="font-family: Arial, FontAwesome">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn formSubmit">
                        Sumbit
                    </button>
                </div>
                <p class="pt-3">Already have account? <a href="/auth/login">Login</a></p>
            </form>
        </div>
    </div>
</section>

<?php
loadPartials('footer');

?>