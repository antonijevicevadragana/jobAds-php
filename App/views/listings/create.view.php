<?php
loadPartials('head');
loadPartials('nav');
?>
<section class="formContainer">
    <div class="content">
        <div class="row justify-content-center frame">
            <h1 class="text-center">POST JOB </h1>
            <hr>
            <form method="POST" action="/listings">
                <h2 class="text-center">About company</h2>
                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['company']) ? 'is-invalid' : '' ?>" name="company" value="<?= htmlspecialchars($listing['company'] ?? '') ?>" placeholder="&#xf1ad; Company Name *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['company'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['company']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['city']) ? 'is-invalid' : '' ?>" name="city" value="<?= htmlspecialchars($listing['city'] ?? '') ?>" placeholder="&#xf3c5; City *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['city'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['city']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['state']) ? 'is-invalid' : '' ?>" name="state" value="<?= htmlspecialchars($listing['state'] ?? '') ?>" placeholder="&#xf3c5; State *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['state'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['state']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['address']) ? 'is-invalid' : '' ?>" name="address" value="<?= htmlspecialchars($listing['address'] ?? '') ?>" placeholder="&#xf3c5; Address *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['address'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['address']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="phone" class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" name="phone" value="<?= htmlspecialchars($listing['phone'] ?? '') ?>" placeholder="&#xf2a0; Phone number" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['phone'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['phone']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= htmlspecialchars($listing['email'] ?? '') ?>" placeholder="&#xf0e0; E-mail *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['email'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['email']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <h2 class="text-center mt-5">About job position</h2>

                <div class="input-box mb-5">
                    <input type="text" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" name="title" value="<?= htmlspecialchars($listing['title'] ?? '') ?>" placeholder="&#xf044; Job Title *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['title'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['title']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <textarea name="role_summary" rows="10" class="custom-textarea <?= isset($errors['role_summary']) ? 'is-invalid' : '' ?>" placeholder="Role Summary *"><?= htmlspecialchars($listing['role_summary'] ?? '') ?></textarea>
                <?php if (isset($errors['role_summary'])) : ?>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['role_summary']) ?>
                    </div>
                <?php endif; ?>

                <textarea name="description" rows="10" class="custom-textarea <?= isset($errors['description']) ? 'is-invalid' : '' ?>" placeholder="Job Description *"><?= htmlspecialchars($listing['description'] ?? '') ?></textarea>
                <?php if (isset($errors['description'])) : ?>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['description']) ?>
                    </div>
                <?php endif; ?>

                <textarea name="requirements" rows="10" class="custom-textarea <?= isset($errors['requirements']) ? 'is-invalid' : '' ?>" placeholder="Requirements *"><?= htmlspecialchars($listing['requirements'] ?? '') ?></textarea>
                <?php if (isset($errors['requirements'])) : ?>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['requirements']) ?>
                    </div>
                <?php endif; ?>

                <textarea name="benefits" rows="10" class="custom-textarea <?= isset($errors['benefits']) ? 'is-invalid' : '' ?>" placeholder="Benefits *"><?= htmlspecialchars($listing['benefits'] ?? '') ?></textarea>
                <?php if (isset($errors['benefits'])) : ?>
                    <div class="invalid-feedback">
                        <?= htmlspecialchars($errors['benefits']) ?>
                    </div>
                <?php endif; ?>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['tags']) ? 'is-invalid' : '' ?>" name="tags" value="<?= htmlspecialchars($listing['tags'] ?? '') ?>" placeholder="&#xf02c; Tags *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['tags'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['tags']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['salary']) ? 'is-invalid' : '' ?>" name="salary" value="<?= htmlspecialchars($listing['salary'] ?? '') ?>" placeholder="&#x24; Salary" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['salary'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['salary']) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="input-box">
                    <input type="text" class="form-control <?= isset($errors['work_location']) ? 'is-invalid' : '' ?>" name="work_location" value="<?= htmlspecialchars($listing['work_location'] ?? '') ?>" placeholder="&#xf3c5; Work Location - remote, hybrid or on-site *" style="font-family: Arial, FontAwesome">
                    <?php if (isset($errors['work_location'])) : ?>
                        <div class="invalid-feedback">
                            <?= htmlspecialchars($errors['work_location']) ?>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="d-grid gap-2">
                    <br>
                    <button type="submit" class="btn formSubmit">
                        Sumbit
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>

<?php
loadPartials('footer');

?>