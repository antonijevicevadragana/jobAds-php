<?php
loadPartials('head');
loadPartials('nav');
?>
<section class="formContainer login">
    <div class="content">
        <div class="row justify-content-center frame">
            <h1 class="text-center">Register</h1>
            <hr>
            <form method="POST" action="/auth/register">
            <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= $user['name'] ?? '' ?>" placeholder="&#xf007; Name" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['name'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['name']) ?>
                        </div>
                    <?php endif; ?>
                </div>
            <div class="input-box">
                    <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= $user['email'] ?? '' ?>" placeholder="&#xf0e0; Email" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['email'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['email']) ?>
                        </div>
                    <?php endif; ?>
                </div>
             
                <div class="input-box">
                    <input type="password"  class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" name="password" value="" placeholder="&#xf023; Password" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['password'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['password']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="password" class="form-control <?= isset($errors['confirmation_password']) ? 'is-invalid' : '' ?>"  name="confirmation_password" value="" placeholder="&#xf023; Confirm Password" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['confirmation_password'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['confirmation_password']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['state']) ? 'is-invalid' : '' ?>" name="state" value="<?= $user['state'] ?? '' ?>" placeholder="&#xf3c5; State" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['state'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['state']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['city']) ? 'is-invalid' : '' ?>" name="city" value="<?= $user['city'] ?? '' ?>" placeholder="&#xf3c5; City" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['city'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['city']) ?>
                        </div>
                    <?php endif; ?>
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