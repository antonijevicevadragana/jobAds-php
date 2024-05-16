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
            <?= loadPartials('errors', ['errors' => $errors ?? []])?>
                <h2 class="text-center">About company</h2>
                <div class="input-box">
                    <label for="company" class="col-form-label text-md-end">Company Name</label>
                    <input type="text" class="form-control" name="company" value="<?= $listing['company'] ?? '' ?>" placeholder="&#xf1ad;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="city" class="col-form-label text-md-end">City</label>
                    <input type="text" class="form-control" name="city" value="<?= $listing['city'] ?? '' ?>" placeholder="&#xf3c5;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="state" class="col-form-label text-md-end">State</label>
                    <input type="text" class="form-control" name="state" value="<?= $listing['state'] ?? '' ?>" placeholder="&#xf3c5;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="address" class="col-form-label text-md-end">Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $listing['address'] ?? '' ?>" placeholder="&#xf3c5;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="text" class="col-form-label text-md-end">Phone number</label>
                    <input type="phone" class="form-control" name="phone" value="<?= $listing['phone'] ?? '' ?>" placeholder="&#xf2a0;" style="font-family: Arial, FontAwesome">
                </div>
                <div class="input-box">
                    <label for="email" class="col-form-label text-md-end">E-mail</label>
                    <input type="email" class="form-control" name="email" value="<?= $listing['email'] ?? '' ?>" placeholder="&#xf0e0;" style="font-family: Arial, FontAwesome">
                </div>

                <h2 class="text-center mt-5">About job position</h2>


                <div class="input-box mb-5">
                    <label for="title" class=" col-form-label text-md-end">Job Title</label>
                    <input type="text" class="form-control" name="title" value="<?= $listing['title'] ?? '' ?>" placeholder="&#xf044;" style="font-family: Arial, FontAwesome">
                </div>

                <textarea name="role_summary" rows="10" class="custom-textarea" placeholder="Role Summary"><?= $listing['role_summary'] ?? ''?></textarea>

                <textarea name="description" rows="10" class="custom-textarea"  placeholder="Job Description"><?= $listing['description'] ?? ''?></textarea>

                <textarea name="requirements" rows="10" class="custom-textarea" placeholder="Requirements"><?= $listing['requirements'] ?? ''?></textarea>

                <textarea name="benefits" rows="10" class="custom-textarea" placeholder="Benefits"><?= $listing['benefits'] ?? ''?></textarea>

                <div class="input-box">
                    <label for="tags" class="col-form-label text-md-end">Tags</label>
                    <input type="text" class="form-control" name="tags" value="<?= $listing['tags'] ?? '' ?>" placeholder="&#xf02c;" style="font-family: Arial, FontAwesome">
                </div>

                <div class="input-box">
                    <label for="salary" class="col-form-label text-md-end">Salary</label>
                    <input type="text" class="form-control" name="salary" value="<?= $listing['salary'] ?? '' ?>" placeholder="&#x24;" style="font-family: Arial, FontAwesome">
                </div>

                <div class="input-box">
                    <label for="work_location" class="col-form-label text-md-end" value="<?= $listing['work_location'] ?? '' ?>" >Work Location</label>
                    <input type="text" class="form-control" name="work_location" placeholder="&#xf3c5; remote, hybrid or on-site" style="font-family: Arial, FontAwesome">
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