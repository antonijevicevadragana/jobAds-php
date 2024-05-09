<?php
loadPartials('head');
loadPartials('nav');
?>


<section class="formContainer">
        <div class="content">
            <div class="row justify-content-center frame">
                <h2 class="text-center">POST JOB</h2>
                <form method="" action="">
                    <div class="input-box">
                        <label for="email" class="col-form-label text-md-end">Company Name</label>
                        <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus placeholder="&#xf0e0;" style="font-family: Arial, FontAwesome">
                    </div>

                    <div class="input-box">
                        <label for="email" class="col-form-label text-md-end">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus placeholder="&#xf0e0;" style="font-family: Arial, FontAwesome">
                    </div>

                    <div class="input-box">
                        <label for="password" class=" col-form-label text-md-end">Job Title</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="&#xf023;" style="font-family: Arial, FontAwesome">
                    </div>

                    <div class="input-box">
                        <label for="password" class=" col-form-label text-md-end">Job Description</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="&#xf023;" style="font-family: Arial, FontAwesome">
                    </div>

                    <div class="input-box">
                        <label for="password" class=" col-form-label text-md-end">Short Description</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="&#xf023;" style="font-family: Arial, FontAwesome">
                    </div>

                    <div class="input-box">
                        <label for="password" class=" col-form-label text-md-end">Tags</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="&#xf023;" style="font-family: Arial, FontAwesome">
                    </div>

                    <div class="input-box">
                        <label for="password" class=" col-form-label text-md-end">Location</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="&#xf023;" style="font-family: Arial, FontAwesome">
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